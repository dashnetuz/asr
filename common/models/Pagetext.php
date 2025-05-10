<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pagetext".
 *
 * @property int $id
 * @property int $page_id
 * @property string $meta_description
 * @property string $description
 * @property string $meta_description_ru
 * @property string $description_ru
 * @property string $meta_description_en
 * @property string $description_en
 * @property string $filename
 * @property string $status
 * @property string $child_id
 * @property string $parent_id
 * @property string $user_id
 * @property string $created_at
 * @property int $picture
 */
class Pagetext extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagetext';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public $icon;
    public function rules()
    {
        return [
            [['description', 'description_ru', 'description_en', 'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'required'],
            [['filename'], 'string', 'max' => 255],
            [['description', 'description_ru', 'description_en', 'meta_description', 'meta_description_ru', 'meta_description_en'], 'string', 'max' => 50000],
            [['status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'integer'],
            ['picture', 'file', 'extensions' => ['text'], 'skipOnEmpty' => true],
            ['icon', 'file', 'extensions' => ['text'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getDescriptionTranslate(){
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
//    public function getUrl1()
//    {
//        if(\Yii::$app->language == 'ru'){
//            return $this->url_ru;
//        }
//        if(\Yii::$app->language == 'uz'){
//            return $this->url;
//        }
//        if(\Yii::$app->language == 'en'){
//            return $this->url_en;
//        }
//
//    }
    public function getMetaTitleTranslate(){
        if(\Yii::$app->language == 'ru'){
            return $this->meta_title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->meta_title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->meta_title_en;
        }
    }

    public function Deletes(){
        $this->status = 0;
        $this->user_id = Yii::$app->user->identity->id;
        if ($this->save(false)){
            return true;
        }else{
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
//            'page_id' => Yii::t('app', 'Pages ID'),
            'description' => Yii::t('app', 'Description'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_en' => Yii::t('app', 'Description En'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_description_ru' => Yii::t('app', 'Meta Description Ru'),
            'filename' => Yii::t('app', 'Filename'),
            'status' => Yii::t('app', 'Status'),
            'child_id' => Yii::t('app', 'Child'),
            'parent_id' => Yii::t('app', 'Parent'),
            'user_id' => Yii::t('app', 'Posted by'),
            'created_at' => Yii::t('app', 'Created'),
            'picture' => Yii::t('app', 'text'),
        ];
    }
}
