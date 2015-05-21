<?php

namespace frontend\models;
use frontend\controllers\ProduseController;
use frontend\controllers\ClientiController;
use frontend\controllers\AngajatiController;
use frontend\models\Tranzactie;

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
            [['cod_angajat', 'id_client', 'suma_acordata', 'suma_datorata', 'data_rambursarii', 'comisionul_lunar', 'alte_specificatii', 'cod_produs'], 'required'],
            [['cod_angajat', 'id_client', 'cod_produs'], 'integer'],
            [['data_incheierii', 'data_rambursarii'], 'safe'],
            [['suma_acordata', 'suma_datorata', 'comisionul_lunar'], 'number'],
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
            'cod_angajat' => 'Cod Angajat',
            'id_client' => 'Numele clientului',
            'data_incheierii' => 'Data Incheierii',
            'suma_acordata' => 'Suma acordata',
            'suma_datorata' => 'Suma datorata',
            'data_rambursarii' => 'Data rambursarii',
            'comisionul_lunar' => 'Comision',
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

     public function getClient($id2)
    {
        
        $client = ClientiController::findModel($id2);
        $nume = $client->nume;
        $prenume= $client->prenume;
        return $nume ."  ". $prenume;
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


    public function actualizareProduse()
     {
        $models = Amanetare::find()->all();
         $arr=array();
       
         foreach ($models as $m) {
                $time = new \DateTime('now');
                $today=$time->format('Y-m-d');
             
            $tranzactie = Tranzactie::findOne(['cod_contract_amanetare'=>$m->cod_contract]);
            $tPlata = Tranzactie::find()->where(['cod_contract_amanetare'=>  $m->cod_contract,'tip_tranzactie' => 'Plata finala'])->all();                         
            $tRata = Tranzactie::find()->where(['cod_contract_amanetare'=>  $m->cod_contract, 'tip_tranzactie' => 'Rata'])->all();
            $produs = Produse::findOne($m->cod_produs);
            $rata =0;
            $arr_length=count($tRata);
            for($i=0;$i<$arr_length;$i++)
            {
                $rata = $rata+ $tRata[$i]->suma;
                

            }
            

            $plata =0;
            $arr_length2=count($tPlata);
            for($i=0;$i<$arr_length2;$i++)
            {
                $plata = $plata+ $tPlata[$i]->suma;
            }

            //cazul ratei
            if($today > $m->data_rambursarii)
            {
                if($rata < $m->suma_datorata || $plata < $m->suma_datorata)
                {
                    $produs->situatie="in stoc";
                    $produs->save();
                }
                else
                    if($rata == $m->suma_datorata || $plata == $m->suma_datorata)
                    {
                        $produs->situatie="returnat";
                        $produs->save();
                    }
            }   
            else 
            if ($today <= $m->data_rambursarii)
            {
                    if($rata == $m->suma_datorata || $plata == $m->suma_datorata)
                    {
                        $produs->situatie="returnat";
                        $produs->save();
                    }
                    else{
                $produs->situatie="amanetare";
                $produs->save();}
            }          
    
         }
     
     }

}
