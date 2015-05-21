<?php

namespace frontend\models;


use frontend\controllers\ProduseController;
use Yii;

/**
 * This is the model class for table "vanzare_cumparare".
 *
 * @property integer $cod_contract
 * @property integer $cod_angajat
 * @property integer $id_client
 * @property integer $cod_produs
 * @property string $data_inchieierii
 * @property double $suma_contractata
 * @property string $tip_tranzactie
 * @property string $alte_specificatii
 *
 * @property Produse $codProdus
 * @property Clienti $idClient
 * @property Angajati $codAngajat
 */
class VanzareCumparare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vanzare_cumparare';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_angajat', 'id_client', 'cod_produs', 'suma_contractata', 'tip_tranzactie', 'alte_specificatii'], 'required'],
            [['cod_angajat', 'id_client', 'cod_produs'], 'integer'],
            [['data_inchieierii'], 'safe'],
            [['suma_contractata'], 'number'],
            [['tip_tranzactie', 'alte_specificatii'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_contract' => 'Cod Contract',
            'cod_angajat' => 'Cod Angajat',
            'id_client' => 'Numele clientului',
            'cod_produs' => 'Denumire produs',
            'data_inchieierii' => 'Data Inchieierii',
            'suma_contractata' => 'Suma Contractata',
            'tip_tranzactie' => 'Tip Tranzactie',
            'alte_specificatii' => 'Alte Specificatii',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodProdus()
    {
        return $this->hasOne(Produse::className(), ['_cod' => 'cod_produs']);
    }

    public function getProdus($id)
    {
        
        $produs = ProduseController::findModel($id);
        $denumire = $produs->denumire;
        return $denumire;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient()
    {
        return $this->hasOne(Clienti::className(), ['_id' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodAngajat()
    {
        return $this->hasOne(Angajati::className(), ['cod_angajat' => 'cod_angajat']);
    }
}
