<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "oldnews".
 *
 * @property int $id
 * @property string $category
 * @property int $type
 * @property int $visible
 * @property int $creator
 * @property int $created_date
 * @property string $title
 * @property string $second_title
 * @property string $anons
 * @property string $body
 * @property string $main_image
 * @property string $secondary_image
 * @property string $icon
 * @property string $seen_count
 * @property string $event_date
 * @property int $ban
 * @property string $update_date
 * @property string $slider
 * @property int $status
 */
class Oldnews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oldnews';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
            ['category', 
              'type', 
              'visible', 
              'creator', 
              'created_date', 
              'title', 
              'second_title', 
              'anons', 
              'body',
              'main_image', 
              'secondary_image', 
              'icon', 
              'seen_count', 
              'event_date', 
              'ban',
              'update_date', 
              'slider', 
              'status'
            ],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Kategoriyasi'),
            'creator' => Yii::t('app', 'Creatori'),
            'created_date' => Yii::t('app', 'Sanasi'),
            'title' => Yii::t('app', 'Nomi'),
            'second_title' => Yii::t('app', 'Ikkinchi nomi'),
            'anons' => Yii::t('app', 'Anons'),
            'body' => Yii::t('app', 'Body'),
            'main_image' => Yii::t('app', 'Rasm'),
            'seen_count' => Yii::t('app', 'Ko`rganlar soni'),
            'ban' => Yii::t('app', 'Ban'),
            'update_date' => Yii::t('app', 'O`zgartirilgan sana'),
            'slider' => Yii::t('app', 'Slider'),
        	'status' => Yii::t('app', 'Status'),
        ];
    }

    

    public function Eye(){
        $this->eye = 0;
        $this->user_id = Yii::$app->user->identity->id;
        if ($this->save(false)){
            return true;
        }else{
            return false;
        }
    }
    
    
}
