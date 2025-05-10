<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "oqim".
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $title
 * @property string $key
 */
class Oqim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oqim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['product_id', 'user_id', 'key'], 'required'],
            [['title'], 'required', 'message' => 'Iltimos oqim nomini kiriting!' ],
            [['product_id', 'user_id'], 'integer'],
            [['title', 'key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Oqim nomi'),
            'key' => Yii::t('app', 'Key'),
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getStream()
    {
        return $this->hasOne(Stream::className(), ['oqim_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function Key()
    {
        $this->key = Yii::$app->security->generateRandomString();
    }
    public function Create($id)
    {
        $this->key = Yii::$app->security->generateRandomString(6);

        while (strpos($this->key,'-') !== false or strpos($this->key,'_') !== false)
        {
            $this->key = Yii::$app->security->generateRandomString(6);
        }

        $this->user_id = Yii::$app->user->id;
        $this->title = $this->title;
        $this->product_id = $id;

        if($this->save(false))
        {
            return true;
        }
    }

    public function CreateClick(){

        $check = Click::findOne(['user_ip' => Yii::$app->request->userIP, 'oqim_id' => $this->id]);

        if ($check === null){
            $click = new Click();
            $click->oqim_id = $this->id;
            $click->user_id = $this->user->id;
            $click->user_ip = Yii::$app->request->userIP;
            $click->date = time();
            $click->save(false);
        }else{
            $check->date = time();
            $check->save(false);
        }


    }
}
