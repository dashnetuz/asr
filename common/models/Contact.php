<?php

namespace common\models;

use Yii;

class Contact extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'contact';
    }


    public function rules()
    {

        return [
            ['full_name', 'required', 'message' => Yii::t('app', '«Ism» to`ldirish shart.')],
            [['full_name'], 'string', 'max' => 255],
            ['tell', 'required', 'message' => Yii::t('app', '«Telefon» to`ldirish shart.')],
            [['tell'], 'string', 'max' => 255],
            ['project', 'required', 'message' => Yii::t('app', '«Dastur» to`ldirish shart.')],
            [['project'], 'string', 'max' => 255],
            ['age', 'required', 'message' => Yii::t('app', '«Age» to`ldirish shart.')],
            [['age'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 5000],
            [['status', 'created_at', 'user_id'], 'integer'],

        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public function SendTelegram()
    {
        $text = '';
        $text .= "💻 :" . "iqac.asr.gov.uz" . " saytidan\n";
        $text .= "🖊 FISH: " . $this->full_name . "\n";
        $text .= "🖊 Telefon raqami: " . $this->tell . "\n";

        $page = Page::findOne($this->project);
        $projectTitle = $page ? $page->title : 'Noma\'lum yo\'nalish';
        $text .= "🖊 Tanlagan yo'nalishi: " . $projectTitle . "\n";

        $text .= "🖊 Yoshi: " . $this->age . "\n";
        $text .= "🖊 Xat: " . $this->text . "\n";

        // Barcha adminlarga xabar yuborish
        if (Yii::$app->bot->sendOrdersBot($text)) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'To`liq Ism-Familyangiz'),
            'tell' => Yii::t('app', 'Telefon raqamingiz'),
            'project' => Yii::t('app', 'Dastur'),
            'age' => Yii::t('app', 'Yosh'),
            'text' => Yii::t('app', 'Sizning xatingiz'),
            'user_id' => Yii::t('app', 'User'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Yuklangan sana'),
        ];
    }
}