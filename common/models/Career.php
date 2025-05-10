<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Career".
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
 * @property string $faculty
 * @property string $majors
 * @property string $tell
 * @property string $mail
 * @property string $rezume
 * @property int $created_at
 */
class Career extends \yii\db\ActiveRecord
{
	public $rezume_file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'career';
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
        ['faculty', 'required', 'message' => Yii::t('app', 'Fakultetni tanlang!')],
        ['majors', 'required', 'message' => Yii::t('app', 'Ta’lim yo’nalishini kiriting!')],
        ['tell', 'required', 'message' => Yii::t('app', 'Telefon nomeringizni kiriting!')],
        ['mail', 'required', 'message' => Yii::t('app', 'Mailingizni kiriting!')],
        ['rezume_file', 'required', 'message' => Yii::t('app', 'Obyektivka faylini yuklang!')],
        [['first_name', 'last_name', 'middle_name', 'gender', 'level', 'form', 'faculty', 'majors', 'tell', 'mail', 'rezume', 'status'], 'string', 'max' => 255],
        [['passportseria'], 'string', 'max' => 2],
        [['passportnumber'], 'string', 'max' => 7],
        [['rezume_file'], 'file', 'extensions' => ['pdf', 'doc', 'docx', 'jpg', 'png']],
        [['created_at'], 'integer'],
           
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
        	'passportseria' => Yii::t('app', 'Passport seriya'),
        	'passportnumber' => Yii::t('app', 'Passport nomer'),
            'rezume' => Yii::t('app', 'Obyektivka'),
        	'rezume_file' => Yii::t('app', 'Obyektivka yoki sertifikat yuklang'),
            'gender' => Yii::t('app', 'Jinsingiz'),
            'level' => Yii::t('app', 'Ta’lim daraja'),
            'form' => Yii::t('app', 'Ta’lim shakli'),
            'faculty' => Yii::t('app', 'Fakultet'),
            'majors' => Yii::t('app', 'Ta`lim yo`nalishi'),
        	'tell' => Yii::t('app', 'Tell nomer'),
        	'mail' => Yii::t('app', 'Mail'),
        	'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Yuklangan sana'),
        ];
    }
}