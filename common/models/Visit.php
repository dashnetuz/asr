<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property string $date
 * @property int $url
 * @property int $ip
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
           
            [['date', 'url', 'ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
        	'url' => Yii::t('app', 'Url'),
        	'ip' => Yii::t('app', 'IP'),
        ];
    }
}
