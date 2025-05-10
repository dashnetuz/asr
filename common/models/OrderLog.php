<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_log".
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property int $admin_id
 * @property int|null $old_status
 * @property int|null $new_status
 * @property string|null $time
 */
class OrderLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'admin_id'], 'required'],
            [['order_id', 'user_id', 'admin_id', 'old_status', 'new_status'], 'integer'],
            [['time'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id' => 'admin_id']);
    }

    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    public function getSelectUser()
    {
        $users = User::find()->all();
        foreach ($users as $user) {
            $data[$user->id] = ($user->first_name == '') ? $user->tell : $user->first_name . ' ' . $user->last_name;
        }
        return $data;
    }

    public function getSelectStatus()
    {
        $dataForTheCreator = [
            Orders::STATUS_NEW => Yii::t("app", "New"),
            Orders::STATUS_READY_TO_DELIVERY => Yii::t("app", "Ready for delivery"),
            Orders::STATUS_BEING_DELIVERED => Yii::t("app", "Being delivered"),
            Orders::STATUS_PREPARING => Yii::t("app", "Preparing"),
            Orders::STATUS_HOLD => Yii::t("app", "Hold"),
            Orders::STATUS_DELIVERED => Yii::t("app", "Delivered"),
            Orders::STATUS_THEN_TAKES => Yii::t("app", "Then takes"),
            Orders::STATUS_RETURNED => Yii::t("app", "Returned"),
            Orders::STATUS_RETURNED_OPERATOR => Yii::t("app", "Returned (Operator)"),
            Orders::STATUS_COURIER_RETURNED => Yii::t("app", "Returned (Courier)"),
            Orders::STATUS_BLACK_LIST => Yii::t("app", "Black list"),
        ];

        return $dataForTheCreator;
    }

    public function getStatusOld(){
        if ($this->old_status === Orders::STATUS_NEW){
            return '<span class="label label-info">' . Yii::t("app", "New") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_BEING_DELIVERED){
            return '<span class="label label-warning">' . Yii::t("app", "Being delivered") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_DELIVERED){
            return '<span class="label label-success">' . Yii::t("app", "Delivered") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_RETURNED){
            return '<span class="label label-danger">' . Yii::t("app", "Returned") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_HOLD){
            return '<span class="label bg-gray-active color-palette">' . Yii::t("app", "Hold") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_READY_TO_DELIVERY){
            return '<span class="label label-primary">' . Yii::t("app", "Ready for delivery") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_BLACK_LIST){
            return '<span class="label bg-black-active color-palette">' . Yii::t("app", "Black list") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_THEN_TAKES){
            return '<span class="label bg-navy color-palette">' . Yii::t("app", "Then takes") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_RETURNED_OPERATOR){
            return '<span class="label label-danger">' . Yii::t("app", "Returned (Operator)") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_COURIER_RETURNED){
            return '<span class="label label-danger">' . Yii::t("app", "Returned (Courier)") .  '</span>';
        }
        elseif ($this->old_status === Orders::STATUS_PREPARING){
            return '<span class="label bg-purple-active color-palette">' . Yii::t("app", "Preparing") .  '</span>';
        }
        else {
            return $this->old_status;
        }
    }

    public function getStatusNew(){
        if ($this->new_status === Orders::STATUS_NEW){
            return '<span class="label label-info">' . Yii::t("app", "New") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_BEING_DELIVERED){
            return '<span class="label label-warning">' . Yii::t("app", "Being delivered") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_DELIVERED){
            return '<span class="label label-success">' . Yii::t("app", "Delivered") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_RETURNED){
            return '<span class="label label-danger">' . Yii::t("app", "Returned") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_HOLD){
            return '<span class="label bg-gray-active color-palette">' . Yii::t("app", "Hold") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_READY_TO_DELIVERY){
            return '<span class="label label-primary">' . Yii::t("app", "Ready for delivery") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_BLACK_LIST){
            return '<span class="label bg-black-active color-palette">' . Yii::t("app", "Black list") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_THEN_TAKES){
            return '<span class="label bg-navy color-palette">' . Yii::t("app", "Then takes") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_RETURNED_OPERATOR){
            return '<span class="label label-danger">' . Yii::t("app", "Returned (Operator)") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_COURIER_RETURNED){
            return '<span class="label label-danger">' . Yii::t("app", "Returned (Courier)") .  '</span>';
        }
        elseif ($this->new_status === Orders::STATUS_PREPARING){
            return '<span class="label bg-purple-active color-palette">' . Yii::t("app", "Preparing") .  '</span>';
        }
        else {
            return $this->new_status;
        }
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'old_status' => Yii::t('app', 'Old Status'),
            'new_status' => Yii::t('app', 'New Status'),
            'time' => Yii::t('app', 'Time'),
        ];
    }
}
