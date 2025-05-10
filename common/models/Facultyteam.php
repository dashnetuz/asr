<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "facultyteam".
 *
 * @property int $id
 * @property int $faculty_id
 * @property string $fullname
 * @property string $fullname_ru
 * @property string $fullname_en
 * @property string $url
 * @property string $url_ru
 * @property string $url_en
 * @property string $meta_fullname
 * @property string $meta_fullname_ru
 * @property string $meta_fullname_en
 * @property string $occupation
 * @property string $occupation_ru
 * @property string $occupation__en
 * @property string $meta_description
 * @property string $description
 * @property string $description_ru
 * @property string $meta_description_ru
 * @property string $description_en
 * @property string $meta_description_en
 * @property string $filename
 * @property string $status
 * @property string $child_id
 * @property string $parent_id
 * @property string $user_id
 * @property string $created_at
 * @property int $picture
 */
class Facultyteam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facultyteam';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public $icon;
    public function rules()
    {
        return [
            [['faculty_id', 'fullname', 'fullname_ru', 'fullname_en', 'url', 'url_ru', 'url_en', 'meta_fullname', 'meta_fullname_ru', 'meta_fullname_en',
                'occupation', 'occupation_ru', 'occupation_en', 'meta_description', 'meta_description_ru', 'meta_description_en',
                'description', 'description_ru', 'description_en',
                'filename', 'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'required'],
            [['fullname', 'fullname_ru', 'fullname_en', 'url', 'url_ru', 'url_en', 'meta_fullname', 'meta_fullname_ru', 'meta_fullname_en', 'filename'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru', 'meta_description_en',
                'description', 'description_ru', 'description_en',
                'occupation', 'occupation_ru', 'occupation_en',], 'string', 'max' => 500],
            [['faculty_id', 'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'integer'],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
            ['icon', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif', 'svg'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function getFullnameTranslate(){
        if(\Yii::$app->language == 'ru'){
            return $this->fullname_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->fullname;
        }
        if(\Yii::$app->language == 'en'){
            return $this->fullname_en;
        }
    }

    public function getOccupationTranslate(){
        if(\Yii::$app->language == 'ru'){
            return $this->occupation_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->occupation;
        }
        if(\Yii::$app->language == 'en'){
            return $this->occupation_en;
        }
    }

    public function getMetaFullnameTranslate(){
        if(\Yii::$app->language == 'ru'){
            return $this->meta_fullname_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->meta_fullname;
        }
        if(\Yii::$app->language == 'en'){
            return $this->meta_fullname_en;
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

    public function Deletes(){
        $this->status = 0;
        $this->user_id = Yii::$app->user->identity->id;
        if ($this->save(false)){
            return true;
        }else{
            return false;
        }
    }
    public function getAvatar(){
            return '/backend/web/uploads/facultyteam/icon/' . $this->filename;
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'fullname' => Yii::t('app', 'F.I.Sh'),
            'fullname_ru' => Yii::t('app', 'F.I.Sh Ru'),
            'fullname_en' => Yii::t('app', 'F.I.Sh En'),
            'url' => Yii::t('app', 'Url'),
            'url_ru' => Yii::t('app', 'Url Ru'),
            'url_en' => Yii::t('app', 'Url En'),
            'occupation'=> Yii::t('app', 'Lavozimi Uz'),
            'occupation_ru'=> Yii::t('app', 'Lavozimi Ru'),
            'occupation_en'=> Yii::t('app', 'Lavozimi En'),
            'meta_fullname' => Yii::t('app', 'Meta Fullname'),
            'meta_fullname_ru' => Yii::t('app', 'Meta Fullname Ru'),
            'meta_fullname_en' => Yii::t('app', 'Meta Fullname En'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_description_ru' => Yii::t('app', 'Meta Description Ru'),
            'description'=> Yii::t('app', 'Xodim haqida qisqacha fikr Uz'),
            'description_ru'=> Yii::t('app', 'Xodim haqida qisqacha fikr Ru'),
            'description_en'=> Yii::t('app', 'Xodim haqida qisqacha fikr En'),
            'filename' => Yii::t('app', 'Rasm 3x4'),
            'status' => Yii::t('app', 'Status'),
            'child_id' => Yii::t('app', 'Child'),
            'parent_id' => Yii::t('app', 'Parent'),
            'user_id' => Yii::t('app', 'Posted by'),
            'created_at' => Yii::t('app', 'Created'),
            'picture' => Yii::t('app', 'Picture'),
        ];
    }
}
