<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ttj;

/**
 * TelegramSearch represents the model behind the search form of `common\models\Ttj`.
 */
class TtjSearch extends Ttj
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'faculty_id', 'created_at'], 'integer'],
        	[['first_name', 'last_name', 'middle_name', 'passport', 'student_card', 'base', 'mail', 'tell'], 'string'],
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
        $query = Ttj::find();

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
            'faculty_id' => $this->faculty_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'mail' => $this->mail,
            'tell' => $this->tell,
            'passport' => $this->passport,
            'student_card' => $this->student_card,
            'base' => $this->base,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'faculty_id', $this->faculty_id]);

        return $dataProvider;
    }
}
