<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about_us".
 *
 * @property int $id
 * @property string $title
 * @property string $title_ru
 * @property string $text
 * @property string $text_ru
 */
class AboutUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_us';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'text', 'text_ru', 'text_en', 'filename'], 'required'],
            [['text', 'text_ru', 'text_en', 'filename'], 'string'],
            [['title', 'title_ru', 'title_en', 'filename'], 'string', 'max' => 500],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
     
     public function getTitle1()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->title_en;
        }
        
    }
    
    public function getDescription1()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->text_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->text;
        }
        if(\Yii::$app->language == 'en'){
            return $this->text_en;
        }
        
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Названия',
            'filename' => 'Photo',
            'title_ru' => 'Названия Ru',
            'title_en' => 'Названия En',
            'text' => 'Matn',
            'text_ru' => 'текст',
            'text_en' => 'text',
        ];
    }
}
