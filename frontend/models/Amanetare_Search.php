<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Amanetare;

/**
 * Amanetare_Search represents the model behind the search form about `frontend\models\Amanetare`.
 */
class Amanetare_Search extends Amanetare
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_contract', 'cod_angajat'], 'integer'],
            [['data_incheierii', 'alte_specificatii', 'id_client', 'cod_produs'], 'safe'],
            [['suma_acordata', 'suma_datorata', 'comisionul_lunar'], 'number'],
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
        $query = Amanetare::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idClient');

        $query->andFilterWhere([
            'cod_contract' => $this->cod_contract,
            'cod_angajat' => $this->cod_angajat,
            'data_incheierii' => $this->data_incheierii,
            'suma_acordata' => $this->suma_acordata,
            'suma_datorata' => $this->suma_datorata,
            'comisionul_lunar' => $this->comisionul_lunar,
            'cod_produs' => $this->cod_produs,
        ]);

        $query->andFilterWhere(['like', 'clienti.nume', $this->id_client]);

        $query->andFilterWhere(['like', 'alte_specificatii', $this->alte_specificatii]);

        return $dataProvider;
    }
}
