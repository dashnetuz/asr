<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $count
 * @property string $total
 * @property string $created_date
 * @property string $comment
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_date', 'comment', 'name', 'phone', 'status'], 'required'],
            [['status', 'product_id'], 'integer'],
            [['created_date', 'name', 'phone'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 500],
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Клиент',
            'product_id' => 'Товар',
            'count' => 'Кол-во',
            'total' => 'Общее',
            'status' => "Положение",
            'created_date' => 'Дата создания',
            'comment' => 'Comment',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProducts()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
