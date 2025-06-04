<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $phone;
    public $body;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name'], 'required', 'message' => Yii::t("app", "Please enter your first and last name!")],
            [['phone'], 'required', 'message' => Yii::t("app", "Please enter your phone number!")],
            [['body'], 'required', 'message' => Yii::t("app", "Please enter your message!")],
            // verifyCode needs to be entered correctly
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function SendTelegram()
    {
        $text = '';
        $text .= "💻  Новый вопрос от BekShop.uz ".date("d/m/Y H:i:s")."\n";
        $text .= "🖊 ФИО: ".$this->name."\n";
        $text .= "☎️ Телефон: ".$this->phone."\n";
        $text .= "💳 сообщение: ".$this->body."\n";

        if (Yii::$app->bot->sendSms($text)){
            return true;
        }
    }
    public function attributeLabels()
    {
        if(\Yii::$app->language == 'ru'){
            return [
                'name' => "ФИО",
                'phone' => "Предмет",
                'body' => "Ваше сообщение"
            ];
        }
        if(\Yii::$app->language == 'uz'){
            return [
                'name' => "To'liq ismi sharif",
                'phone' => "Mavzu",
                'body' => "Sizning xatingiz"
            ];
        }
        if(\Yii::$app->language == 'en'){
            return [
                'name' => "Full name",
                'phone' => "Subject",
                'body' => "Your message"
            ];
        }
    }
}
