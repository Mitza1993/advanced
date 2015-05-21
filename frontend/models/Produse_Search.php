<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Produse;

/**
 * Produse_Search represents the model behind the search form about `frontend\models\Produse`.
 */
class Produse_Search extends Produse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_cod', 'cantitate'], 'integer'],
            [['denumire', 'tip', 'unitate', 'caracteristici', 'stare', 'situatie'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Produse::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            '_cod' => $this->_cod,
            'cantitate' => $this->cantitate,
        ]);

        $query->andFilterWhere(['like', 'denumire', $this->denumire])
            ->andFilterWhere(['like', 'tip', $this->tip])
            ->andFilterWhere(['like', 'unitate', $this->unitate])
            ->andFilterWhere(['like', 'caracteristici', $this->caracteristici])
            ->andFilterWhere(['like', 'stare', $this->stare])
            ->andFilterWhere(['like', 'situatie', $this->situatie]);

        return $dataProvider;
    }
}
