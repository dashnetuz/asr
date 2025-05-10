<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Oldnews;

/**
 * OldnewsSearch represents the model behind the search form of `common\models\Oldnews`.
 */
class OldnewsSearch extends Oldnews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'creator'], 'integer'],
            [[
              'category', 
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
            ], 'safe'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Oldnews::find()->orderBy(['id' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'status' => $this->status,
            'creator' => $this->creator,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'second_title', $this->second_title])
            ->andFilterWhere(['like', 'anons', $this->anons])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'main_image', $this->main_image])
            ->andFilterWhere(['like', 'seen_count', $this->seen_count])
            ->andFilterWhere(['like', 'ban', $this->ban])
            ->andFilterWhere(['like', 'update_date', $this->update_date])
            ->andFilterWhere(['like', 'slider', $this->slider])
            ->andFilterWhere(['like', 'status', $this->status])
            ;

        return $dataProvider;
    }
}
