<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "home_category".
 *
 * @property int $id
 * @property int $home_id
 * @property int $category_id
 *
 * @property Home $home
 * @property Category $category
 */
class HomeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['home_id', 'category_id'], 'required'],
            [['home_id', 'category_id'], 'integer'],
            [['home_id'], 'exist', 'skipOnError' => true, 'targetClass' => Home::className(), 'targetAttribute' => ['home_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'home_id' => 'Home ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHome()
    {
        return $this->hasOne(Home::className(), ['id' => 'home_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
