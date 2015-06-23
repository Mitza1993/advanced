<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tranzactie;

/**
 * Tranzactie_Search represents the model behind the search form about `frontend\models\Tranzactie`.
 */
class Tranzactie_Search extends Tranzactie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'cod_contract_amanetare'], 'integer'],
            [['suma'], 'number'],
            [['data', 'tip_tranzactie'], 'safe'],
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
        $query = Tranzactie::find();

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
            '_id' => $this->_id,
            'cod_contract_amanetare' => $this->cod_contract_amanetare,
            'suma' => $this->suma,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'tip_tranzactie', $this->tip_tranzactie]);

        return $dataProvider;
    }

    public function search2($params,$cod_contract_amanetare)
    {
        $query = Tranzactie::find();

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
            '_id' => $this->_id,
            'cod_contract_amanetare' => $cod_contract_amanetare,
            'suma' => $this->suma,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'tip_tranzactie', $this->tip_tranzactie]);

        return $dataProvider;
    }
}
