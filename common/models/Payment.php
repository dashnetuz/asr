<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_date
 * @property string $payed_date
 * @property int $status
 * @property int $amount
 * @property int $stat
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */

    const STATUS_EXPECTED = 0;
    const STATUS_PAYED = 1;
    const STATUS_NOT_PAID = 0;
    const STATUS_PAID = 1;
    public function rules()
    {
        return [
            [['amount'], 'required', 'message' => "Iltimos pul miqdorini kiriting"],
            [['user_id'], 'required', 'message' => "Iltimos Profil menyusidan shaxsiy plastik kartangizni kiriting!"],
            [['status', 'amount', 'stat'], 'integer'],
            ['amount','findPasswords'],
            ['amount','check'],
            [['created_date', 'payed_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findPasswords($attribute, $params){

        $amount = AdminOrders::find()->where(['admin_id' => Yii::$app->user->id, 'status' => 0])->sum('amount');

        if($this->amount > $amount)
        {
            $this->addError($attribute, \Yii::t("app",'Sizning hisobingizda buncha pul miqdori yo`q iltimos ishlashda davom eting!'));
        }

    }

    public function findCard($attribute, $params){

        if(1==1)
        {
            $this->addError($attribute, \Yii::t("app",'Iltimos Profil menyusidan shaxsiy plastik kartangizni kiriting!!'));
        }

    }

    public function check($attribute, $params){

        $payed = Payment::find()->where(['user_id' => Yii::$app->user->id, 'status' => 0])->all();

        if(!empty($payed))
        {
            $this->addError($attribute, \Yii::t("app",'Sizda hali to`lanmagan pul miqdori mavjud iltimos kuting'));
        }

    }

    public function AdminSendTelegram()
    {
        if ($this->user->step == 3){

            $text = '';
            $text .= Yii::$app->params['og_site_name']['content'] . " - pul o'tkazish so'rovi amalga oshirildi.\n";
            $text .= "Summa - " . number_format($this->amount) . " uzs \n";
            $text .= "Karta - ".$this->user->card." \n";

            Yii::$app->bot->sendAdminBot($text, $this->user->user_chat_id);

            return  true;
        }
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStatus1()
    {
        if ($this->status == 1)
        {
            return "To'landi";
        }else
        {
            return "Kutilmoqda";
        }
    }

    public function getStatusForPayment()
    {
        if ($this->status == self::STATUS_PAID)
        {
            return '<span class="label label-success">'. Yii::t("app", "Paid") .'</span>';
        }else
        {
            return '<span class="label label-danger">'. Yii::t("app", "Not paid") .'</span>';
        }
    }

    public function getSelectStatus()
    {
        $data1 = [
            '0' => 'Kutilmoqda',
            '1' => 'To`landi',
        ];
        return $data1;
    }

    public function getSelectUser()
    {
        $category = User::find()->all();
        foreach ($category as $c) {
            $data[$c->id] = $c->first_name . ' ' . $c->last_name;
        }
        return $data;
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Credit card number'),
            'created_date' => Yii::t('app', 'Pul so`ralgan sana'),
            'payed_date' => Yii::t('app', 'To`langan sana'),
            'status' => Yii::t('app', 'Status'),
            'amount' => Yii::t('app', 'Pul miqdori'),
        ];
    }
}
