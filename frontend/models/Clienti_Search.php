<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Clienti;

/**
 * Clienti_Search represents the model behind the search form about `frontend\models\Clienti`.
 */
class Clienti_Search extends Clienti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'telefon'], 'integer'],
            [['nume', 'prenume', 'cnp_client', 'seria_ci', 'adresa'], 'safe'],
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
        $query = Clienti::find();

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
            'telefon' => $this->telefon,
        ]);

        $query->andFilterWhere(['like', 'nume', $this->nume])
            ->andFilterWhere(['like', 'prenume', $this->prenume])
            ->andFilterWhere(['like', 'cnp_client', $this->cnp_client])
            ->andFilterWhere(['like', 'seria_ci', $this->seria_ci])
            ->andFilterWhere(['like', 'adresa', $this->adresa]);

        return $dataProvider;
    }
}
