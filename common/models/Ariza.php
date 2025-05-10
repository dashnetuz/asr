<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Ariza".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $passportseria
 * @property string $passportnumber
 * @property string $gender
 * @property string $level
 * @property string $form
 * @property string $majors
 * @property string $passport
 * @property string $diplom
 * @property int $created_at
 * @property int $user_id
 */
class Ariza extends \yii\db\ActiveRecord
{
	public $passport_file;
	public $diplom_file;
    public $checkbox;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ariza';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        
        return [
            ['first_name', 'required', 'message' => Yii::t('app', 'Ismingizni kiriting!')],
            ['last_name', 'required', 'message' => Yii::t('app', 'Familyangizni kiriting!')],
            ['middle_name', 'required', 'message' => Yii::t('app', 'Sharifingizni kiriting!')],
            ['passportseria', 'required', 'message' => Yii::t('app', 'Maydon bo`sh!')],
            ['passportnumber', 'required', 'message' => Yii::t('app', 'Maydon bo`sh!')],
            ['gender', 'required', 'message' => Yii::t('app', 'Iltimos, jinsingizni tanlang!')],
            ['level', 'required', 'message' => Yii::t('app', 'Ta’lim darajasini tanlang!')],
            ['form', 'required', 'message' => Yii::t('app', 'Ta’lim shaklini tanlang!')],
            ['majors', 'required', 'message' => Yii::t('app', 'Ta’lim yo’nalishini kiriting!')],

            ['checkbox', 'boolean'],
            ['checkbox', 'required', 'message' => 'Siz bu yerda keltirilgan shartlarni qabul qilishingiz kerak.'],

            [['passport_file'], 'file', 'extensions' => 'pdf, doc, docx, jpg, png'],
            [['diplom_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx, jpg, png'],
            [['first_name', 'last_name', 'middle_name', 'gender', 'level', 'form', 'majors', 'passport', 'diplom'], 'string', 'max' => 255],
            [['passportseria'], 'string', 'max' => 3],
            [['passportnumber'], 'string', 'max' => 9],
            [['created_at', 'user_id'], 'integer'],
           
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function Smstabrik () {
        $text = 'Tabriklaymiz!';
        $text .= "Siz Xalqaro ijtimoiy innovatsiyalar universiteti talabasi bo'ldingiz! \n";
        $text .= "Tabrik xatini ushbu silka orqali yuklab olishingiz mumkin:\n";
        $text .= "https://iusi.uz/site/main";

        Yii::$app->playmobile->sendSms('+998' . $this->user->tell, $text);

        return  true;
    }

    public function Smsshartnoma (){
        $text .= "Sizga Xalqaro ijtimoiy innovatsiyalar universitetidan shartnoma yuborildi. \n";
        $text .= "Shartnomani ushbu havola orqali yuklab olishingiz mumkin:\n";
        $text .= "https://iusi.uz/site/main";

        Yii::$app->playmobile->sendSms('+998' . $this->user->tell, $text);

        return  true;
     }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'Ism'),
            'last_name' => Yii::t('app', 'Familya'),
            'middle_name' => Yii::t('app', 'Sharif'),
        	'passportseria' => Yii::t('app', 'Passport seriya'),
        	'passportnumber' => Yii::t('app', 'Passport nomer'),
            'passport' => Yii::t('app', 'Passport'),
            'diplom' => Yii::t('app', 'DTM sertifikati'),
        	'passport_file' => Yii::t('app', 'Passport file'),
            'diplom_file' => Yii::t('app', 'DTM sertifikati (Agar mavjud bo`lsa)'),
            'gender' => Yii::t('app', 'Jinsingiz'),
            'level' => Yii::t('app', 'Ta’lim daraja'),
            'form' => Yii::t('app', 'Ta’lim shakli'),
            'majors' => Yii::t('app', 'Ta`lim yo`nalishi'),
        	'user_id' => Yii::t('app', 'User'),
            'checkbox' => Yii::t('app', 'Check'),
            'created_at' => Yii::t('app', 'Yuklangan sana'),
        ];
    }
}