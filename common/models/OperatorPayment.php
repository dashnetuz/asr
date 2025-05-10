<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operator_payment".
 *
 * @property int $id
 * @property int $operator_id
 * @property int $amount
 * @property int $status
 * @property string $created_date
 * @property string|null $payed_date
 */
class OperatorPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['operator_id', 'amount'], 'required'],
            [['operator_id', 'amount', 'status'], 'integer'],
            ['amount', 'checkAmount'],
            ['amount','check'],
            [['created_date', 'payed_date'], 'string', 'max' => 255],
        ];
    }

    public function checkAmount($attribute, $params){

        $model = OperatorOrders::find()->where(['operator_id' => Yii::$app->user->id, 'status' => 0])->sum('amount');

        if($this->amount > $model)
        {
            $this->addError($attribute, \Yii::t("app",'Sizning hisobingizda buncha pul miqdori yo`q iltimos ishlashda davom eting!'));
        }

    }

    /**
     * {@inheritdoc}
     */
    public function getOperator()
    {
        return $this->hasOne(User::className(), ['id' => 'operator_id']);
    }

    public function check($attribute, $params){

        $payed = OperatorPayment::find()->where(['operator_id' => Yii::$app->user->id, 'status' => 0])->all();

        if(!empty($payed))
        {
            $this->addError($attribute, \Yii::t("app",'Sizda hali to`lanmagan pul miqdori mavjud iltimos kuting'));
        }

    }

    public function getStatus1()
    {
        if ($this->status == 1)
        {
            return "To'landi";
        }else
        {
            return "Kutilmoqda";
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'operator_id' => Yii::t('app', 'Operator ID'),
            'amount' => Yii::t('app', 'Amount'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
            'payed_date' => Yii::t('app', 'Payed Date'),
        ];
    }
}
