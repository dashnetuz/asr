<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "home".
 *
 * @property int $id
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 *
 * @property HomeCategory[] $homeCategories
 */
class Home extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en'], 'required'],
            [['title', 'title_ru', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeCategories()
    {
        return $this->hasMany(HomeCategory::className(), ['home_id' => 'id']);
    }
}
