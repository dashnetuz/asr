<?php

namespace common\models;

use common\models\Orders;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * OrdersSearch represents the model behind the search form of `common\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public $myPageSize;
    public $price;

    public function rules()
    {
        return [
            [['id', 'control_id', 'status', 'user_id', 'operator_id'], 'integer'],
            [['country', 'addres', 'full_name', 'phone', 'delivery_time'], 'string', 'max' => 255],
            [['text', 'product_id'], 'string'],
            [['myPageSize', 'price'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStream()
    {
        return $this->hasOne(Stream::className(), ['id' => 'control_id']);
    }

    public function getDate(){
        return date('dd-M-yyyy', intval($this->text));
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchs($params)
    {
        $query = Orders::find()->where(['id' => $params]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5000,
            ],
        ]);

        return $dataProvider;
    }

    public function search($params)
    {
        $query = Orders::find()->orderBy(['id' => SORT_DESC])->joinWith(['product', 'stream'])->alias('o');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->myPageSize,
            ],
        ]);



        $dataProvider->sort->attributes['product_id'] = [
            'asc' => ['product.title' => SORT_ASC],
            'desc' => ['product.title' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'o.user_id' => $this->user_id,
            'o.operator_id' => $this->operator_id,
            'country' => $this->country,
            'addres' => $this->addres,
            'o.status' => $this->status,
        ]);

        if ($this->text != '') {
            $query->andFilterWhere(['between', 'text', strtotime($this->text), strtotime($this->text) + 3600 * 24]);
        }

        if ($this->delivery_time != '') {
            $query->andFilterWhere(['between', 'delivery_time', strtotime($this->delivery_time), strtotime($this->delivery_time) + 3600 * 24]);
        }

        if ($this->control_id !== null){
            $stream = Stream::find()->where(['user_id' => $this->control_id, 'status' => 1])->all();
            $items  = [];
            foreach ($stream as $item){
                $items[] = $item->id;

            }
        }

        if ($this->control_id !== null) {
            $query->andFilterWhere(['control_id' => $items]);
        }

        if ($this->myPageSize !== null) {
            $dataProvider->pagination->pageSize = ($this->myPageSize !== NULL) ? $this->myPageSize : 20;
        }

        if ($this->country !== null) {
            $query->andFilterWhere(['like', 'country', $this->country]);
        }

        if ($this->full_name !== null) {
            $query->andFilterWhere(['like', 'full_name', $this->full_name]);
        }
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        $query->andFilterWhere(['like', 'o.id', $this->id]);
        $query->andFilterWhere(['like', 'product.title', $this->product_id]);

        return $dataProvider;
    }
}
