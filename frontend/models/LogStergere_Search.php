<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LogStergere;

/**
 * LogStergere_Search represents the model behind the search form about `frontend\models\LogStergere`.
 */
class LogStergere_Search extends LogStergere
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_angajat', 'value', 'type'], 'integer'],
            [['timestamp'], 'safe'],
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
        $query = LogStergere::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_angajat' => $this->id_angajat,
            'value' => $this->value,
            'timestamp' => $this->timestamp,
            'type' => $this->type,
        ]);

        

        return $dataProvider;
    }
}
