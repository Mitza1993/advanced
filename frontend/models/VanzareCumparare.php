<?php

namespace frontend\models;


use frontend\controllers\ProduseController;
use frontend\models\Clienti;
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
            [['cod_angajat', 'id_client', 'cod_produs', 'suma_contractata', 'tip_tranzactie', 'alte_specificatii'], 'required','message'=>'Campul {attribute} nu poate fi gol.'],
            [['cod_angajat', 'id_client', 'cod_produs'], 'integer'],
            [['data_inchieierii'], 'safe'],
            [['suma_contractata'], 'number','message'=>'Introduceti doar valori numerice.'],
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
            'cod_angajat' => 'Nume angajat',
            'id_client' => 'Nume client',
            'cod_produs' => 'Denumire produs',
            'data_inchieierii' => 'Data Incheierii',
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

    public function getClienti()
    {
        $clienti = Clienti::find()->all();
         $arr=array();
        foreach ($clienti as $c) {
            return $c->nume . $c->prenume;
        }
    }

     public function getAngajati($cod_angajat)
    {
        $angajat = AngajatiController::findModel($cod_angajat);
        $nume_prenume = $angajat->nume. $angajat->prenume;
        return $nume_prenume;
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

    public function getValoareC()
{
    return $this->hasMany(O::className(), ['COD_CONTRACT' => 'id'])->sum('amount');
}

public static function getTotal($provider, $fieldName)
{


    $total=0;
    foreach($provider as $item){
        $total+=$item[$fieldName];
    }

    return $total;
}




}
