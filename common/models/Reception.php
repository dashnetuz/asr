<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reception".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $p_series
 * @property string $p_number
 * @property string $mail
 * @property string $tell
 * @property string $description
 * @property int $created_at
 */
class Reception extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reception';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'last_name', 'middle_name', 'p_series', 'p_number', 'mail', 'tell', 'description'], 'required'],
            [['first_name', 'last_name', 'middle_name', 'mail', 'tell'], 'string', 'max' => 255],
            [['p_series', 'p_number'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 50000],
            [['user_id', 'created_at'], 'integer'],
        	['first_name', 'required', 'message' => Yii::t("app", "Iltimos Ismingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
            ['last_name', 'required', 'message' => Yii::t("app", "Iltimos Familyangizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
        	['middle_name', 'required', 'message' => Yii::t("app", "Iltimos Sharifingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
        	['p_series', 'required', 'message' => Yii::t("app", "Iltimos pasport seriangizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
        	['p_number', 'required', 'message' => Yii::t("app", "Iltimos pasport raqamingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
            ['mail', 'required', 'message' => Yii::t("app", "Iltimos mailingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
            ['tell', 'required', 'message' => Yii::t("app", "Iltimos telefon raqamingizni kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
            }],
            ['description', 'required', 'message' => Yii::t("app", "Iltimos tavsinfi kiriting!"), 'when' => function($model){
                return ( Yii::$app->controller->action->id == 'reception' ) ? true : false;
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
            'p_series' => Yii::t('app', 'Passport seria'),
            'p_number' => Yii::t('app', 'Passport nomer'),
            'mail' => Yii::t('app', 'Mail'),
            'tell' => Yii::t('app', 'Tell'),
            'description' => Yii::t('app', 'Tavsif'),
            'user_id' => Yii::t('app', 'Yo`nalish'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
