<?php

namespace common\models;

use Yii;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $oqim_id
 * @property int $status
 * @property int $delete
 * @property int $competition
 * @property int $operator_id
 * @property int $user_id
 * @property int $count
 * @property int $qr_code
 * @property int|null $product_id
 * @property string $country
 * @property string $take_time
 * @property string $addres
 * @property string $full_name
 * @property string $phone
 * @property string $comment
 * @property string $price;
 * @property string $updated_date
 * @property string $delivery_time
 * @property string|null $text
 */
class Orders extends \yii\db\ActiveRecord
{
    public $soni;
    public $kuni;
    public $myPageSize;
    public $price;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */

    const STATUS_NEW = 0;
    const STATUS_BEING_DELIVERED = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_RETURNED = 3;
    const STATUS_RETURNED_OPERATOR = 9;
    const STATUS_BLACK_LIST = 8;
    const STATUS_THEN_TAKES = 5;
    const STATUS_READY_TO_DELIVERY = 4;
    const STATUS_HOLD = 6;
    const STATUS_PREPARING = 10;
    const STATUS_COURIER_RETURNED = 7;

    public function rules()
    {
        return [
            [['product_id','control_id', 'status', 'user_id', 'oqim_id', 'delete', 'operator_id', 'count'], 'integer'],
            [['full_name'], 'required', 'message' => \Yii::t("app","Please enter your first and last name!")],
            [['phone'], 'required', 'message' => \Yii::t("app","Please enter your phone number!")],
            ['phone','findPasswords'],
            ['phone','checkBlackList'],
//            [['country'], 'required', 'message' => \Yii::t("app","Please select a region!")],
            [['text'], 'string'],
            [['qr_code'], 'integer'],
            [['country', 'addres', 'full_name', 'phone', 'comment', 'updated_date', 'take_time', 'delivery_time'], 'string', 'max' => 255],
            [['control_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stream::className(), 'targetAttribute' => ['control_id' => 'id']],
            [['myPageSize', 'price', 'competition'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function findPasswords($attribute, $params){
        $this->phone = strtr($this->phone, [
            '+998' => '',
            '-' => '',
            '(' => '',
            ')' => '',
            ' ' => '',
            '_' => '',
        ]);
        if(strlen($this->phone) < 9)
        {
            $this->addError($attribute, \Yii::t("app",'Please enter the correct phone number!'));
        }

    }

    public function checkBlackList($attribute, $params){
        $this->phone = strtr($this->phone, [
            '+998' => '',
            '-' => '',
            '(' => '',
            ')' => '',
            ' ' => '',
            '_' => '',
        ]);

        $model = BlackList::findOne(['phone_number' => $this->phone]);

        if($model !== null)
        {
            $this->addError($attribute, \Yii::t("app",'You are blacklisted!'));
        }

    }

    public function beforeSave($insert, $attr = NULL)
    {
        if ($this->status == self::STATUS_DELIVERED)
        {
            if ($this->product->in_stock != 0){
                $this->product->in_stock = $this->product->in_stock - 1;
                $this->product->save(false);
            }

            if ($this->product->status == 1) {

                if ($this->product->charity == 0){

                    $adminCoin = new AdminGold();
                    $adminCoin->InsertNew($this);

                    $adminOrder = new AdminOrders();
                    $adminOrder->InsertNew($this);
                }

                if($this->user->status_delivered == 1){
                    $this->AdminSendDeliveredTelegram();
                }


                if ($this->product->charity == 1){
                    $adminCharity = new AdminCharity();
                    $adminCharity->InsertNew($this);
                }

            }

            if ($this->operator_id !== null)
            {
                $model = new OperatorOrders();
                $model->InsertNew($this);
            }

        }

        if ($this->count == null)
        {
            $this->count = 1;
        }

        if ($this->status == self::STATUS_READY_TO_DELIVERY && $this->user->status_ready_to_delivery == 1){
            $this->AdminSendReadyToDeliveryTelegram();
        }
        
        if (!$this->isNewRecord && $this->oldAttributes['status'] != $this->status){
            $this->insertNewOrderLog();
        }

        if (!$this->isNewRecord && $this->oldAttributes['status'] == self::STATUS_THEN_TAKES && $this->status != self::STATUS_THEN_TAKES){
            $this->take_time = null;
        }

        if ($this->status == self::STATUS_RETURNED || $this->status == self::STATUS_RETURNED_OPERATOR || $this->status == self::STATUS_COURIER_RETURNED){
            if($this->user->status_returned == 1){
                $this->AdminSendReturnedTelegram();
            }
        }

        if($this->status == self::STATUS_THEN_TAKES && $this->user->status_then_takes == 1){
            $this->AdminSendThenTakesTelegram();
        }

        if($this->status == self::STATUS_HOLD && $this->user->status_hold == 1){
            $this->AdminSendHoldTelegram();
        }

        if($this->status == self::STATUS_PREPARING && $this->user->status_preparing == 1){
            $this->AdminSendPreparingTelegram();
        }

        if ($this->status == self::STATUS_BLACK_LIST)
        {
            $check = BlackList::findOne(['phone_number' => $this->phone]);
            if ($check === null)
            {
                $black = new BlackList();
                $black->phone_number = $this->phone;
                $black->created_date = time();
                $black->save(false);
            }

            if($this->user->status_black_list == 1){
                $this->AdminSendBlackListTelegram();
            }
        }

        if ($this->status == self::STATUS_BEING_DELIVERED)
        {
            $this->delivery_time = time();
            if ($this->qr_code == null || !file_exists(dirname(dirname(__DIR__)) . '/backend/web/uploads/QrCodes/' . $this->qr_code . '.png'))
            {
                $this->qr_code = $this->id . time();
                $this->QrCodeGenerate();
            }
            if ($this->product->status == 1 && $this->user->status_being_delivered == 1){
                $this->AdminSendBeingDeliveredTelegram();
            }
        }

        return parent::beforeSave($insert, $attr = NULL);
    }
    
    public function insertNewOrderLog(){
        $model = new OrderLog();
        $model->user_id = Yii::$app->user->id;
        $model->admin_id = $this->user_id;
        $model->order_id = $this->id;
        $model->old_status = $this->oldAttributes['status'];
        $model->new_status = $this->status;
        $model->time = time();
        $model->save(false);
    }

    public function InsertNew($product, $oqim){
        $this->product_id = $product->id;
        $this->addres = $product->id;
        $this->oqim_id = $oqim->id;
        $this->text = time();
        $this->comment = '';
        $this->user_id = $oqim->user->id;
        $this->control_id = 100;
        $this->save(false);

        return true;
    }

    public function InsertNewDry($product){
        $this->product_id = $product->id;
        $this->addres = $product->id;
        $this->text = time();
        $this->comment = '';
        $this->user_id = 1;
        $this->control_id = 100;
        if ($this->save(false))
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function getStatusForPanel(){
        if ($this->status == self::STATUS_NEW){
            return Yii::t("app", "New");
        }
        if ($this->status == self::STATUS_BEING_DELIVERED){
            return Yii::t("app", "Being delivered");
        }
        if ($this->status == self::STATUS_DELIVERED){
            return Yii::t("app", "Delivered");
        }
        if ($this->status == self::STATUS_RETURNED){
            return Yii::t("app", "Returned");
        }
        if ($this->status == self::STATUS_READY_TO_DELIVERY){
            return Yii::t("app", "Ready for delivery");
        }
        if ($this->status == self::STATUS_BLACK_LIST){
            return Yii::t("app", "Black list");
        }
        if ($this->status == self::STATUS_THEN_TAKES){
            return Yii::t("app", "Then takes");
        }
        if ($this->status == self::STATUS_RETURNED_OPERATOR){
            return Yii::t("app", "Returned");
        }
        if ($this->status == self::STATUS_HOLD){
            return Yii::t("app", "Hold");
        }if ($this->status == self::STATUS_PREPARING){
            return Yii::t("app", "Preparing");
        }
    }

    public function getStatusListForCreator(){
        return [
            Orders::STATUS_NEW => Yii::t("app", "New"),
            Orders::STATUS_READY_TO_DELIVERY => Yii::t("app", "Ready for delivery"),
            Orders::STATUS_BEING_DELIVERED => Yii::t("app", "Being delivered"),
            Orders::STATUS_DELIVERED => Yii::t("app", "Delivered"),
            Orders::STATUS_THEN_TAKES => Yii::t("app", "Then takes"),
            Orders::STATUS_RETURNED => Yii::t("app", "Returned"),
            Orders::STATUS_PREPARING => Yii::t("app", "Preparing"),
            Orders::STATUS_BLACK_LIST => Yii::t("app", "Black list")
        ];
    }

    public function getStatuses(){
        if ($this->status == self::STATUS_NEW){
            return Yii::t("app", "New");
        }
        if ($this->status == self::STATUS_BEING_DELIVERED){
            return Yii::t("app", "Being delivered");
        }
        if ($this->status == self::STATUS_DELIVERED){
            return Yii::t("app", "Delivered");
        }
        if ($this->status == self::STATUS_RETURNED){
            return Yii::t("app", "Returned");
        }
        if ($this->status == self::STATUS_READY_TO_DELIVERY){
            return Yii::t("app", "Ready for delivery");
        }
        if ($this->status == self::STATUS_BLACK_LIST){
            return Yii::t("app", "Black list");
        }
        if ($this->status == self::STATUS_THEN_TAKES){
            return Yii::t("app", "Then takes");
        }
        if ($this->status == self::STATUS_HOLD){
            return Yii::t("app", "Hold");
        }
        if ($this->status == self::STATUS_RETURNED_OPERATOR){
            return Yii::t("app", "Returned");
        }
    }

    public function getStatusess(){
        if ($this->status == self::STATUS_NEW){
            return Yii::t("app", "New");
        }
        if ($this->status == self::STATUS_BEING_DELIVERED){
            return Yii::t("app", "Being delivered");
        }
        if ($this->status == self::STATUS_DELIVERED){
            return Yii::t("app", "Delivered");
        }
        if ($this->status == self::STATUS_RETURNED){
            return Yii::t("app", "Returned");
        }
        if ($this->status == self::STATUS_READY_TO_DELIVERY){
            return Yii::t("app", "Ready for delivery");
        }
        if ($this->status == self::STATUS_BLACK_LIST){
            return Yii::t("app", "Black list");
        }
        if ($this->status == self::STATUS_THEN_TAKES){
            return Yii::t("app", "Then takes");
        }
        if ($this->status == self::STATUS_RETURNED_OPERATOR){
            return Yii::t("app", "Returned (Operator)");
        }
        if ($this->status == self::STATUS_HOLD){
            return Yii::t("app", "Hold");
        }if ($this->status == self::STATUS_PREPARING){
            return Yii::t("app", "Preparing");
        }
    }

    public function getSelectStatus()
    {
        $dataForTheCreator = [
            self::STATUS_NEW => Yii::t("app", "New"),
            self::STATUS_READY_TO_DELIVERY => Yii::t("app", "Ready for delivery"),
            self::STATUS_BEING_DELIVERED => Yii::t("app", "Being delivered"),
            self::STATUS_DELIVERED => Yii::t("app", "Delivered"),
            self::STATUS_THEN_TAKES => Yii::t("app", "Then takes"),
            self::STATUS_HOLD => Yii::t("app", "Hold"),
            self::STATUS_PREPARING => Yii::t("app", "Preparing"),
            self::STATUS_RETURNED => Yii::t("app", "Returned"),
            self::STATUS_RETURNED_OPERATOR => Yii::t("app", "Returned (Operator)"),
            self::STATUS_BLACK_LIST => Yii::t("app", "Black list"),
        ];

        return $dataForTheCreator;
    }

    public function getSelectUser()
    {
        $users = User::find()->all();
        foreach ($users as $user) {
            $data[$user->id] = ($user->first_name == '') ? $user->tell : $user->first_name . ' ' . $user->last_name;
        }
        return $data;
    }

    public function QrCodeGenerate()
    {
            $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data( Yii::$app->request->hostInfo . '/link/' . $this->qr_code)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->logoPath(__DIR__.'/assets/open.png')
            ->labelText(Yii::$app->params['og_site_name']['content'])
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();
        header('Content-Type: '.$result->getMimeType());

        $result->saveToFile(dirname(dirname(__DIR__)) . '/backend/web/uploads/QrCodes/' . $this->qr_code . '.png');

    }

    public function getSelectOperator()
    {
        $users = User::find()->all();
        foreach ($users as $user) {
            $item = AuthAssignment::findOne(['user_id' => $user->id]);
            if($item && $item->item_name == 'operator') {
                $data[$user->id] = $user->username;
            }
        }

        return $data;
    }

    public function getColor(){
        if ($this->status == self::STATUS_NEW){
            return "primary";
        }
        if ($this->status == self::STATUS_BEING_DELIVERED){
            return 'warning';
        }
        if ($this->status == self::STATUS_DELIVERED){
            return 'success';
        }
        if ($this->status == self::STATUS_RETURNED){
            return 'danger';
        }
        if ($this->status == self::STATUS_RETURNED_OPERATOR){
            return 'danger';
        }
        if ($this->status == self::STATUS_HOLD){
            return 'secondary';
        }
        if ($this->status == self::STATUS_BLACK_LIST){
            return 'dark';
        }
        if ($this->status == self::STATUS_THEN_TAKES){
            return 'light';
        }
        if ($this->status == self::STATUS_READY_TO_DELIVERY){
            return 'info';
        }if ($this->status == self::STATUS_PREPARING){
            return 'primary';
        }
    }

    public function getColorForOperatorSearch(){

        if ($this->status == self::STATUS_NEW){
            return 'blue';
        }
        if ($this->status == self::STATUS_RETURNED || $this->status == self::STATUS_RETURNED_OPERATOR){
            return 'red';
        }
        if ($this->status == self::STATUS_DELIVERED){
            return 'blue';
        }
        if ($this->status == self::STATUS_BLACK_LIST){
            return 'dark';
        }
        if ($this->status == self::STATUS_BEING_DELIVERED){
            return 'green';
        }
        if ($this->status == self::STATUS_READY_TO_DELIVERY){
            return 'grey';
        }
        if ($this->status == self::STATUS_THEN_TAKES){
            return 'purple';
        }
        if ($this->status == self::STATUS_HOLD){
            return 'green';
        }
    }

    public function getClass(){
        switch ($this->status) {
            case self::STATUS_NEW:
                return 'info';
                break;
            case self::STATUS_BEING_DELIVERED:
                return 'warning';
                break;
            case self::STATUS_DELIVERED:
                return 'success';
                break;
            case self::STATUS_RETURNED || self::STATUS_RETURNED_OPERATOR:
                return 'danger';
                break;
        }
    }

    public function getStream()
    {
        return $this->hasOne(Stream::className(), ['id' => 'control_id']);
    }

    public function getOqim()
    {
        return $this->hasOne(Oqim::className(), ['id' => 'oqim_id']);
    }

    public function getStreams()
    {
        return $this->hasMany(Stream::className(), ['id' => 'control_id']);
    }

    public function getStreamsByUser()
    {
        return $this
            ->hasMany(Stream::className(), ['id' => 'control_id'])
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->andWhere(['status' => 1]);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getOperator()
    {
        return $this->hasOne(User::className(), ['id' => 'operator_id']);
    }

    public function getControl()
    {
        return $this->hasOne(Stream::className(), ['id' => 'control_id']);
    }

    public function SendTelegram()
    {
        $text = '';
        $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
        $text .= "🖊 ФИО: ".$this->full_name."\n";
        $text .= "☎️ Телефон: ".$this->phone."\n";
        $text .= "💳 Товар: ".$this->product->title."\n";
        $text .= "💵 Цена: Summ ".$this->product->number."\n";

        if (Yii::$app->bot->sendOrdersBot($text)){
            return true;
        }
    }

    public function AdminSendTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma yo'lga chiqdi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendBeingDeliveredTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma yo'lga chiqdi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendNewTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma tushdi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendReadyToDeliveryTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." bilan buyurtma qabul qilindi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendDeliveredTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma yetkazildi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendReturnedTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma qaytarildi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendPreparingTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma Tayyorlanmoqda. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendHoldTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma holdga tushdi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendThenTakesTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma keyin olinadi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function AdminSendBlackListTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= "💻  Новый заказ от " . Yii::$app->params['og_site_name']['content'] . " ".date("d/m/Y H:i:s")."\n";
            $text .= "🆔 ID - ".$this->id." buyurtma qora ro'yhatga tushdi. \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function getDeliveryPrice(){
        if ($this->country == "Toshkent"){
            return ($this->product->delivery) ? $this->product->delivery->tashkent_region : 0;
        }
        if ($this->country == "Buxoro"){
            return ($this->product->delivery) ? $this->product->delivery->bukhara : 0;
        }
        if ($this->country == "Navoiy"){
            return ($this->product->delivery) ? $this->product->delivery->navoi : 0;
        }
        if ($this->country == "Samarqand"){
            return ($this->product->delivery) ? $this->product->delivery->samarkand : 0;
        }
        if ($this->country == "Jizzax"){
            return ($this->product->delivery) ? $this->product->delivery->jizzakh : 0;
        }
        if ($this->country == "Andijon"){
            return ($this->product->delivery) ? $this->product->delivery->andijan : 0;
        }
        if ($this->country == "Farg`ona"){
            return ($this->product->delivery) ? $this->product->delivery->fergana : 0;
        }
        if ($this->country == "Namangan"){
            return ($this->product->delivery) ? $this->product->delivery->namangan : 0;
        }
        if ($this->country == "Sirdaryo"){
            return ($this->product->delivery) ? $this->product->delivery->syrdarya : 0;
        }
        if ($this->country == "Qoraqalpog`iston"){
            return ($this->product->delivery) ? $this->product->delivery->karakalpakstan : 0;
        }
        if ($this->country == "Xorazm"){
            return ($this->product->delivery) ? $this->product->delivery->khorezm : 0;
        }
        if ($this->country == "Qashqadaryo"){
            return ($this->product->delivery) ? $this->product->delivery->kashkadarya : 0;
        }
        if ($this->country == "Surxondaryo"){
            return ($this->product->delivery) ? $this->product->delivery->surkhandarya : 0;
        }
    }

    public function Data()
    {
        $data = [
            'NotSet' => 'NotSet',
            'Toshkent' => 'Toshkent',
            'Buxoro' => 'Buxoro',
            'Navoiy' => 'Navoiy',
            'Samarqand' => 'Samarqand',
            'Jizzax' => 'Jizzax',
            'Andijon' => 'Andijon',
            'Farg`ona' => 'Farg`ona',
            'Namangan' => 'Namangan',
            'Sirdaryo' => 'Sirdaryo',
            'Qoraqalpog`iston' => 'Qoraqalpog`iston',
            'Xorazm' => 'Xorazm',
            'Qashqadaryo' => 'Qashqadaryo',
            'Surxondaryo' => 'Surxondaryo',
        ];
        return $data;
    }

    public function DataCount()
    {
        $data = [
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ];
        return $data;
    }

    public function getStatusForPayment(){
        if ($this->status == self::STATUS_NEW){
            return '<span class="label label-success">'. Yii::t("app", "New") .'</span>';
        }
        if ($this->status == self::STATUS_BEING_DELIVERED){
            return '<span class="label label-success">'. Yii::t("app", "Being delivered") .'</span>';
        }
        if ($this->status == self::STATUS_DELIVERED){
            return '<span class="label label-success">'. Yii::t("app", "Delivered") .'</span>';
        }
        if ($this->status == self::STATUS_RETURNED){
            return '<span class="label label-danger">'. Yii::t("app", "Returned") .'</span>';
        }
        if ($this->status == self::STATUS_HOLD){
            return '<span class="label label-success">'. Yii::t("app", "Hold") .'</span>';
        }
        if ($this->status == self::STATUS_READY_TO_DELIVERY){
            return '<span class="label label-success">'. Yii::t("app", "Ready for delivery") .'</span>';
        }
        if ($this->status == self::STATUS_BLACK_LIST){
            return '<span class="label label-success">'. Yii::t("app", "Black list") .'</span>';
        }
        if ($this->status == self::STATUS_THEN_TAKES){
            return '<span class="label label-success">'. Yii::t("app", "Then takes") .'</span>';
        }
        if ($this->status == self::STATUS_RETURNED_OPERATOR){
            return '<span class="label label-danger">'. Yii::t("app", "Returned (Operator)") .'</span>';
        }
        if ($this->status == self::STATUS_COURIER_RETURNED){
            return '<span class="label label-danger">'. Yii::t("app", "Returned (Courier)") .'</span>';
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => Yii::t("app", "Product Name"),
            'operator_id' => Yii::t("app", "Operator"),
            'control_id' => Yii::t("app", "Admin"),
            'user_id' => Yii::t("app", "Admin"),
            'country' => Yii::t("app", "Ordered region"),
            'status' => Yii::t("app", "Status"),
            'full_name' => Yii::t("app", "Client"),
            'phone' => Yii::t("app", "Customer phone number"),
            'text' => Yii::t("app", "Order date"),
            'delivery_time' => Yii::t("app", "Approved date"),
            'comment' => Yii::t("app", "Additional Information"),
        ];
    }
}
