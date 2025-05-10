<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operator_orders".
 *
 * @property int $id
 * @property int $order_id
 * @property int $operator_id
 * @property int $amount
 * @property int $status
 * @property string $created_date
 * @property string|null $payed_date
 */
class OperatorOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'operator_id', 'amount', 'status', 'created_date'], 'required'],
            [['order_id', 'operator_id', 'amount', 'status'], 'integer'],
            [['created_date', 'payed_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function InsertNew($order){
        $exist = self::findAll(['order_id' => $order->id]);
        if (empty($exist))
        {
            $model = new self();
            $model->order_id = $order->id;
            $model->operator_id = $order->operator_id;
            $model->amount = 5000;
            $model->status = 0;
            $model->created_date = time();
            $model->save(false);
        }

    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'operator_id' => Yii::t('app', 'Operator ID'),
            'amount' => Yii::t('app', 'Amount'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
            'payed_date' => Yii::t('app', 'Payed Date'),
        ];
    }
}
