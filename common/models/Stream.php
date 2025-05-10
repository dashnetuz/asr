<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stream".
 *
 * @property int $id
 * @property int $oqim_id
 * @property int $status
 */
class Stream extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stream';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oqim_id', 'status','user_id'], 'required'],
//            [['title'], 'string', 'max' => 255],
            [['oqim_id', 'status', 'user_id'], 'integer'],
        ];
    }

    public function getOqim()
    {
        return $this->hasOne(Oqim::className(), ['id' => 'oqim_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'oqim_id' => Yii::t('app', 'Oqim ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
