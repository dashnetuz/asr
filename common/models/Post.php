<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $category_id
 * @property int $gold
 * @property string $filename
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 * @property string $description
 * @property string $description_ru
 * @property string $description_en
 * @property string $started_date
 * @property string $closed_date
 * @property int $created_date
 * @property int $posted_by
 * @property int $status
 *
 * @property PostCategory $category
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public function rules()
    {
        return [
            [['category_id', 'filename', 'title', 'title_ru', 'title_en', 'description', 'description_ru', 'description_en', 'created_date', 'posted_by', 'status'], 'required'],
            [['category_id', 'created_date', 'posted_by', 'status', 'gold'], 'integer'],
            [['description', 'description_ru', 'description_en'], 'string'],
            [['filename', 'title', 'title_ru', 'title_en', 'started_date', 'closed_date'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'picture' => 'Фото',
            'filename' => 'Фото',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'description' => 'Описание',
            'description_ru' => 'Описание Ru',
            'description_en' => 'Описание En',
            'created_date' => 'Дата создания',
            'posted_by' => 'Сообщение от',
            'status' => 'Положение',
            'gold' => 'Count',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getTitleTranslate()
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

    public function getDescriptionTranslate()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->description_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->description;
        }
        if(\Yii::$app->language == 'en'){
            return $this->description_en;
        }
        
    }

    public function getDescription2()
    {
        if(\Yii::$app->language == 'uz')
        { 
            $string = $this->description;
        };
        if(\Yii::$app->language == 'en')
        { 
            $string = $this->description_en;
        };
        if(\Yii::$app->language == 'ru')
        { 
            $string = $this->description_ru;
        };
        $string = strip_tags($string);
        $string = substr($string, 0, 300);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        return $string."… ";
    }

    public function getCategory()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'category_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'posted_by']);
    }
}
