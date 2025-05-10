<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kuryer_orders".
 *
 * @property int $id
 * @property int $order_id
 * @property int $kuryer_id
 * @property int $amount
 * @property int $status
 * @property string $created_date
 * @property string|null $payed_date
 */
class KuryerOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuryer_orders';
    }

    /**
     * {@inheritdoc}
     */

    const STATUS_NOT_GET = 0;
    const STATUS_DELIVERED = 1;
    const STATUS_RETURNED = 2;
    const STATUS_HOLD = 3;

    public function rules()
    {
        return [
            [['order_id', 'kuryer_id', 'status', 'created_date', 'delivered_date', 'returned_date', 'hold_date'], 'required'],
            [['order_id', 'kuryer_id', 'status'], 'integer'],
            [['created_date', 'delivered_date', 'returned_date', 'hold_date'], 'string', 'max' => 255],
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
            $model->kuryer_id = $order->kuryer_id;
            $model->status = 0;
            $model->created_date = time();
            $model->save(false);
        }
    }

    public function getStatusForKuryer()
    {
        if ($this->status == self::STATUS_DELIVERED)
        {
            return '<span class="label label-success">'. Yii::t("app", "Yetkazib berildi") .'</span>';
        }
        elseif ($this->status == self::STATUS_RETURNED){
            return '<span class="label label-danger">'. Yii::t("app", "Qaytarildi") .'</span>';
        }
        elseif ($this->status == self::STATUS_HOLD){
            return '<span class="label label-primary">'. Yii::t("app", "Keyin oladi") .'</span>';
        }
        else {
            return '<span class="label label-danger">'. Yii::t("app", "Qabul qilinmagan") .'</span>';
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'kuryer_id' => Yii::t('app', 'Kuryer ID'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
            'delivered_date' => Yii::t('app', 'Yetkazib berildi'),
            'returned_date' => Yii::t('app', 'Qaytarildi'),
            'hold_date' => Yii::t('app', 'Keyin oladi'),
        ];
    }
}
