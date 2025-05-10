<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ttj".
 *
 * @property int $id
 * @property int $faculty_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $mail
 * @property string $tell
 * @property string $passport
 * @property string $student_card
 * @property string $base
 * @property int $created_at
 */
class Ttj extends \yii\db\ActiveRecord
{
	public $passport_file;
	public $student_card_file;
	public $base_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ttj';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_id', 'last_name', 'middle_name', 'passport_file', 'student_card_file', 'base_file', 'mail', 'tell'], 'required'],
            [['first_name', 'last_name', 'middle_name', 'mail', 'tell'], 'string', 'max' => 255],
            [['passport', 'student_card', 'base'], 'string', 'max' => 255],
        	['passport_file', 'file', 'extensions' => ['pdf', 'doc', 'docx', 'jpg'], 'skipOnEmpty' => true],
        	['student_card_file', 'file', 'extensions' => ['pdf', 'doc', 'docx', 'jpg'], 'skipOnEmpty' => true],
        	['base_file', 'file', 'extensions' => ['pdf', 'doc', 'docx', 'jpg'], 'skipOnEmpty' => true],
            [['faculty_id', 'created_at'], 'integer'],
        	['first_name', 'required', 'message' => Yii::t("app", "Iltimos Ismingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'ttj' ) ? true : false;
            }],
            ['last_name', 'required', 'message' => Yii::t("app", "Iltimos Familyangizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'ttj' ) ? true : false;
            }],
        	['middle_name', 'required', 'message' => Yii::t("app", "Iltimos Sharifingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'ttj' ) ? true : false;
            }],
            ['mail', 'required', 'message' => Yii::t("app", "Iltimos mailingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'ttj' ) ? true : false;
            }],
            ['tell', 'required', 'message' => Yii::t("app", "Iltimos telefon raqamingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'ttj' ) ? true : false;
            }],
           
        ];
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
            'passport' => Yii::t('app', 'Passport'),
            'student_card' => Yii::t('app', 'Talabalik guvohnoma'),
            'base' => Yii::t('app', 'Asos'),
        	'passport_file' => Yii::t('app', 'Passport file'),
            'student_card_file' => Yii::t('app', 'Talabalik file guvohnoma'),
            'base_file' => Yii::t('app', 'Asos file'),
            'mail' => Yii::t('app', 'Mail'),
            'tell' => Yii::t('app', 'Tell'),
            'faculty_id' => Yii::t('app', 'Fakultet'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
