<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Career;

/**
 * TelegramSearch represents the model behind the search form of `common\models\Career`.
 */
class CareerSearch extends Career
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at'], 'integer'],
        	[['first_name', 'last_name', 'middle_name', 'passportseria', 'passportnumber', 'gender', 'level', 'form', 'faculty', 'majors', 'tell', 'mail', 'rezume'], 'string'],
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
    	$query = Career::find()->orderBy(['id' => SORT_DESC]);

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
            'faculty' => $this->faculty,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
        	'passportseria' => $this->passportseria,
        	'passportnumber' => $this->passportnumber,
            'gender' => $this->gender,
            'level' => $this->level,
            'form' => $this->form,
            'majors' => $this->majors,
            'tell' => $this->tell,
            'mail' => $this->mail,
            'rezume' => $this->rezume,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'faculty', $this->faculty]);

        return $dataProvider;
    }
}
