<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin_orders".
 *
 * @property int $id
 * @property int $order_id
 * @property int $admin_id
 * @property int $amount
 * @property int $status
 * @property string $created_date
 * @property string|null $payed_date
 */
class AdminOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_orders';
    }

    /**
     * {@inheritdoc}
     */

    const STATUS_NOT_PAID = 0;
    const STATUS_PAID = 1;
    
    public function rules()
    {
        return [
            [['order_id', 'admin_id', 'amount', 'status', 'created_date'], 'required'],
            [['order_id', 'admin_id', 'amount', 'status'], 'integer'],
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
            $model->admin_id = $order->user_id;
            $model->amount = $order->product->pay;
            $model->status = 0;
            $model->created_date = time();
            $model->save(false);
        }
    }

    public function getStatusForPayment()
    {
        if ($this->status == self::STATUS_PAID)
        {
            return '<span class="label label-success">'. Yii::t("app", "Paid") .'</span>';
        }else
        {
            return '<span class="label label-danger">'. Yii::t("app", "Not paid") .'</span>';
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'amount' => Yii::t('app', 'Amount'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
            'payed_date' => Yii::t('app', 'Payed Date'),
        ];
    }
}
