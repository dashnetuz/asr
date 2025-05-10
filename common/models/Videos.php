<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 * @property string $url
 * @property string $url_ru
 * @property string $url_en
 * @property string $meta_title
 * @property string $meta_title_ru
 * @property string $meta_title_en
 * @property string $meta_description
 * @property string $meta_description_ru
 * @property string $meta_description_en
 * @property string $filename
 * @property string $status
 * @property string $child_id
 * @property string $parent_id
 * @property string $user_id
 * @property string $created_at
 * @property int $picture
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public $files;
    public $icon;
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'url',
//                'files', 'icon',
// 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en',
//                'filename',
                'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'required'],
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'filename'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru', 'meta_description_en'], 'string', 'max' => 500],
            [['status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'integer'],
//            ['files', 'file', 'extensions' => ['pdf'], 'skipOnEmpty' => true],
//            ['icon', 'file', 'extensions' => ['pdf'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function getTitleTranslate(){
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



    public function getUrl1(){
        if(\Yii::$app->language == 'ru'){
            return $this->url_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->url;
        }
        if(\Yii::$app->language == 'en'){
            return $this->url_en;
        }
    }

    public function getMetaDescriptionTranslate(){
        if(\Yii::$app->language == 'ru'){
            return $this->meta_description_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->meta_description;
        }
        if(\Yii::$app->language == 'en'){
            return $this->meta_description_en;
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_en' => Yii::t('app', 'Title En'),
            'url' => Yii::t('app', 'YouTube Url'),
            'url_ru' => Yii::t('app', 'Url Ru'),
            'url_en' => Yii::t('app', 'Url En'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_title_ru' => Yii::t('app', 'Meta Title Ru'),
            'meta_title_en' => Yii::t('app', 'Meta Title En'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_description_ru' => Yii::t('app', 'Meta Description Ru'),
            'filename' => Yii::t('app', 'Filename'),
            'status' => Yii::t('app', 'Status'),
            'child_id' => Yii::t('app', 'Child'),
            'parent_id' => Yii::t('app', 'Parent'),
            'user_id' => Yii::t('app', 'Posted by'),
            'created_at' => Yii::t('app', 'Created'),
            'files' => Yii::t('app', 'File "pdf"'),
        ];
    }
}
