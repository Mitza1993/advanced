<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Angajati;

/**
 * Angajati_Search represents the model behind the search form about `frontend\models\Angajati`.
 */
class Angajati_Search extends Angajati
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_angajat', 'telefon', 'id_user'], 'integer'],
            [['nume', 'prenume', 'adresa', 'cnp', 'seria', 'data_angajarii'], 'safe'],
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
        $query = Angajati::find();

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
            'cod_angajat' => $this->cod_angajat,
            'telefon' => $this->telefon,
            'data_angajarii' => $this->data_angajarii,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nume', $this->nume])
            ->andFilterWhere(['like', 'prenume', $this->prenume])
            ->andFilterWhere(['like', 'adresa', $this->adresa])
            ->andFilterWhere(['like', 'cnp', $this->cnp])
            ->andFilterWhere(['like', 'seria', $this->seria]);

        return $dataProvider;
    }
}
