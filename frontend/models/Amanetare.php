<?php

namespace frontend\models;
use frontend\controllers\ProduseController;
use frontend\controllers\ClientiController;
use frontend\controllers\AngajatiController;
use frontend\models\Tranzactie;

use \DateTime;

use Yii;

/**
 * This is the model class for table "amanetare".
 *
 * @property integer $cod_contract
 * @property integer $cod_angajat
 * @property integer $id_client
 * @property string $data_incheierii
 * @property double $suma_acordata
 * @property double $suma_datorata
 * @property string $data_rambursarii
 * @property double $comisionul_lunar
 * @property string $alte_specificatii
 * @property integer $cod_produs
 *
 * @property Produse $codProdus
 * @property Clienti $idClient
 * @property Angajati $codAngajat
 * @property Tranzactie[] $tranzacties
 */
class Amanetare extends \yii\db\ActiveRecord 
{
    /**
     * @inheritdoc
     */



 
    public static function tableName()
    {
        return 'amanetare';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_angajat','suma_acordata', 'suma_datorata', 'comisionul_lunar', 'alte_specificatii', 'cod_produs'], 'required','message'=>'Campul {attribute} nu poate fi gol.'],
            // [['cod_angajat',  'cod_produs'], 'integer'],

            [['data_incheierii', 'id_client'], 'safe'],
 
            [['suma_acordata', 'suma_datorata', 'comisionul_lunar'], 'number','message'=>'{attribute} este format doar din cifre.'],
            [['alte_specificatii'], 'string']
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

            'id_client' => 'Nume ',
            'data_incheierii' => 'Data Incheierii',
            'suma_acordata' => 'Suma acordata (lei)',
            'suma_datorata' => 'Suma datorata (lei)',
            'comisionul_lunar' => 'Comision (lei)',

            'alte_specificatii' => 'Alte specificatii',
            'cod_produs' => 'Produsul contractat',
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


    public function getProdusUM($id)
    {
        
        $produs = ProduseController::findModel($id);
        $UM = $produs->unitate;
        return $UM;
    }

    public function getProdusCantitate($id)
    {
        
        $produs = ProduseController::findModel($id);
        $cantitate = $produs->cantitate;
        return $cantitate;
    }


     
     public function getClient($id2)
 
    {
        
        $client = ClientiController::findModel($id2);
        $nume = $client->nume;
        $prenume= $client->prenume;
        return $nume ."  ". $prenume;
    }

    public function getClientAdresa($id2)
    {
        
        $client = ClientiController::findModel($id2);
        $adresa = $client->adresa;
        return $adresa;
    }
    public function getClientSerie($id2)
    {
        
        $client = ClientiController::findModel($id2);
        $serie= $client->seria_ci;
        return $serie;
    }

 

     public function getAngajat($id2)
    {
        
        $angajat = AngajatiController::findModel($id2);
        $nume = $angajat->nume;
        $prenume= $angajat->prenume;
        return $nume ."  ". $prenume;
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranzacties()
    {
        return $this->hasMany(Tranzactie::className(), ['cod_contract_amanetare' => 'cod_contract']);
    }



    public function calculZile($cod_contract)
    {
                $tranzactii = Tranzactie::find()->where(['cod_contract_amanetare' => $cod_contract])->all();
                 $produs = Produse::find()->where(['_cod' => $this->cod_produs])->one();
 
                $zile = 0;
                 $suma_platita = 0;
                 $tranzactie_prelungire = 0;
             foreach ($tranzactii as $key => $value) {

                if($value->tip_tranzactie != 'Prelungire') {
                   $suma_platita = $value->suma;
                } else {
                $tranzactie_prelungire = 1;
                $tranzactie = $value;
             }
         }

                if($suma_platita != $this->suma_datorata && $produs->situatie == 'amanetare')
                {
                    $today = new DateTime('now');
                    $data_incheierii = new Datetime($this->data_incheierii);    
                    $zile = $today->diff($data_incheierii)->format("%a");
                     
                      //  return 30-$zile;

                    if($zile < 30 && $tranzactie_prelungire == 0) {
               
                         return 30-$zile;
                
            } else if($zile <= 30 && $tranzactie_prelungire != 0 && $tranzactie->suma == $this->comisionul_lunar){
                $data_tranzactie_prelungire = new DateTime($tranzactie->data);

                $zile = $today->diff($data_tranzactie_prelungire)->format("%a");
                return 30-$zile;
                }
                   
    }
    else
    {
        return 'Contractul a fost incheiat';
    }

   
}

   
 
}
