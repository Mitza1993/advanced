<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tranzactie".
 *
 * @property integer $_id
 * @property integer $cod_contract_amanetare
 * @property double $suma
 * @property string $data
 * @property string $tip_tranzactie
 *
 * @property Amanetare $codContractAmanetare
 */
class Tranzactie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tranzactie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_contract_amanetare', 'suma', 'tip_tranzactie'], 'required','message'=>'Campul {attribute} nu poate fi gol.'],
            [['cod_contract_amanetare'], 'integer'],
            [['suma'], 'number','message'=>'Introduceti doar valori numerice.'],
            [['data'], 'safe'],
            [['tip_tranzactie'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'Prenume',
            'cod_contract_amanetare' => 'Nume ',
            'suma' => 'Suma',
            'data' => 'Data',
            'tip_tranzactie' => 'Tip Tranzactie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodContractAmanetare()
    {
        return $this->hasOne(Amanetare::className(), ['cod_contract' => 'cod_contract_amanetare']);
    }
<<<<<<< HEAD


    
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
}
