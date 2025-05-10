<?php

namespace common\models;

use common\models\Pageteam;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PageteamSearch represents the model behind the search form of `common\models\Pageteam`.
 */
class PageteamSearch extends Pageteam
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'page_id', 'status', 'child_id', 'parent_id', 'user_id', 'created_at'], 'integer'],
            [['fullname', 'fullname_ru', 'fullname_en', 'url', 'url_ru', 'url_en', 'meta_fullname', 'meta_fullname_ru', 'meta_fullname_en',
                'occupation', 'occupation_ru', 'occupation_en', 'meta_description', 'meta_description_ru', 'meta_description_en',
                'description', 'description_ru', 'description_en', 'filename'], 'safe'],
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
        $query = Pageteam::find();

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
            'page_id' => $this->page_id,
            'status' => $this->status,
            'child_id' => $this->child_id,
            'parent_id' => $this->parent_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'fullname_ru', $this->fullname_ru])
            ->andFilterWhere(['like', 'fullname_en', $this->fullname_en])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'url_ru', $this->url_ru])
            ->andFilterWhere(['like', 'url_en', $this->url_en])
            ->andFilterWhere(['like', 'meta_fullname', $this->meta_fullname])
            ->andFilterWhere(['like', 'meta_fullname_ru', $this->meta_fullname_ru])
            ->andFilterWhere(['like', 'meta_fullname_en', $this->meta_fullname_en])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_description_ru', $this->meta_description_ru])
            ->andFilterWhere(['like', 'meta_description_en', $this->meta_description_en])
            ->andFilterWhere(['like', 'filename', $this->filename]);

        return $dataProvider;
    }
}
