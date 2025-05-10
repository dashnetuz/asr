<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property int $id
 * @property int $page_id
 * @property string $filename
 */
class Pagephoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagephoto';
    }

    /**
     * {@inheritdoc}
     */
    public $photos;
    public function rules()
    {
        return [
            [['page_id', 'filename'], 'required'],
            [['page_id', 'status'], 'integer'],
            [['filename'], 'string', 'max' => 255],
            [['photos'], 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp'], 'skipOnEmpty' => true, 'maxFiles' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'filename' => 'Filename',
            'photos' => 'Rasm',
        ];
    }
}
