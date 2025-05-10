<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chair".
 *
 * @property int $id
 * @property int $faculty_id
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
class Chair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chair';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public $icon;
    public function rules()
    {
        return [
            [['faculty_id','title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'required'],
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'filename'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru', 'meta_description_en'], 'string', 'max' => 50000],
            [['faculty_id', 'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'integer'],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
            ['icon', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif', 'svg'], 'skipOnEmpty' => true],
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

    public function getTitle1(){
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
            'faculty_id' => Yii::t('app', 'Fakulteti nomi'),
            'title' => Yii::t('app', 'Kafedra nomi UZ'),
            'title_ru' => Yii::t('app', 'Kafedra nomi Ru'),
            'title_en' => Yii::t('app', 'Kafedra nomi En'),
            'url' => Yii::t('app', 'Url'),
            'url_ru' => Yii::t('app', 'Url Ru'),
            'url_en' => Yii::t('app', 'Url En'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_title_ru' => Yii::t('app', 'Meta Title Ru'),
            'meta_title_en' => Yii::t('app', 'Meta Title En'),
            'meta_description' => Yii::t('app', 'Kafedra tarixi O`zbekcha'),
            'meta_description_ru' => Yii::t('app', 'Kafedra tarixi Ruscha'),
            'meta_description_en' => Yii::t('app', 'Kafedra tarixi Inglizcha'),
            'filename' => Yii::t('app', 'Logo'),
            'status' => Yii::t('app', 'Status'),
            'child_id' => Yii::t('app', 'Child'),
            'parent_id' => Yii::t('app', 'Parent'),
            'user_id' => Yii::t('app', 'Kim tomonidan'),
            'created_at' => Yii::t('app', 'Created'),
            'picture' => Yii::t('app', 'Picture'),
        ];
    }
}
