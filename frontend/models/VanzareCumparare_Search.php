<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\VanzareCumparare;

/**
 * VanzareCumparare_Search represents the model behind the search form about `frontend\models\VanzareCumparare`.
 */
class VanzareCumparare_Search extends VanzareCumparare
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['cod_contract', 'cod_angajat'], 'integer'],
            [['data_inchieierii','cod_produs', 'tip_tranzactie', 'alte_specificatii','id_client'], 'safe'],
=======
            [['cod_contract', 'cod_angajat', 'cod_produs'], 'integer'],
            [['data_inchieierii', 'tip_tranzactie', 'alte_specificatii','id_client'], 'safe'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            [['suma_contractata'], 'number'],
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
        $query = VanzareCumparare::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
<<<<<<< HEAD

        }

        $query->joinWith('idClient');


        $query->andFilterWhere([
            'cod_contract' => $this->cod_contract,
            'cod_angajat' => $this->cod_angajat,
          //  'cod_produs' => $this->cod_produs,
=======
        }

        $query->andFilterWhere([
            'cod_contract' => $this->cod_contract,
            'cod_angajat' => $this->cod_angajat,
            'id_client' => $this->id_client,
            'cod_produs' => $this->cod_produs,
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            'data_inchieierii' => $this->data_inchieierii,
            'suma_contractata' => $this->suma_contractata,
        ]);

        $query->andFilterWhere(['like', 'tip_tranzactie', 'cumparare'])
            ->andFilterWhere(['like', 'alte_specificatii', $this->alte_specificatii]);
<<<<<<< HEAD
            $query->andFilterWhere(['like', 'clienti.nume', $this->id_client]);
            $query->andFilterWhere(['like', 'produse.denumire', $this->id_client]);

=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

        return $dataProvider;
    }
    public function search2($params)
    {
<<<<<<< HEAD
         $query = VanzareCumparare::find();

        $dataProvider = new ActiveDataProvider([
=======
        $query = VanzareCumparare::find();

        $dataProviderTwo = new ActiveDataProvider([
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
<<<<<<< HEAD
            return $dataProvider;

        }

        $query->joinWith('idClient');


        $query->andFilterWhere([
            'cod_contract' => $this->cod_contract,
            'cod_angajat' => $this->cod_angajat,
=======
            return $dataProviderTwo;
        }

        $query->andFilterWhere([
            'cod_contract' => $this->cod_contract,
            'cod_angajat' => $this->cod_angajat,
            'id_client' => $this->id_client,
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            'cod_produs' => $this->cod_produs,
            'data_inchieierii' => $this->data_inchieierii,
            'suma_contractata' => $this->suma_contractata,
        ]);

        $query->andFilterWhere(['like', 'tip_tranzactie', 'vanzare'])
            ->andFilterWhere(['like', 'alte_specificatii', $this->alte_specificatii]);
<<<<<<< HEAD
            $query->andFilterWhere(['like', 'clienti.nume', $this->id_client]);

        return $dataProvider;
=======

        return $dataProviderTwo;
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
    }
}
