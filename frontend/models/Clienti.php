<?php

namespace frontend\models;

use frontend\models\Amanetare;
use frontend\models\Tranzactie;
use Yii;

/**
 * This is the model class for table "clienti".
 *
 * @property integer $_id
 * @property string $nume
 * @property string $prenume
 * @property string $cnp_client
 * @property string $seria_ci
 * @property string $adresa
 * @property string $telefon
 *
 * @property Amanetare[] $amanetares
 * @property VanzareCumparare[] $vanzareCumparares
 */
class Clienti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clienti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prenume','nume','cnp_client', 'seria_ci', 'adresa', 'telefon'], 'required','message'=>'Campul {attribute} nu poat fi gol.'],

            [['telefon'], 'integer','message' =>' Teelefonul trebuie sa contina doar cifre.'],
            [['nume'], 'string', 'max' => 50],
            ['nume','validatorNume'],
            ['prenume','validatorPrenume'],
            ['seria_ci','validatorSeria'],
            ['telefon','validatorTelefon'],
            [['prenume', 'adresa'], 'string', 'max' => 100],
            [['cnp_client'], 'string', 'max' => 13,'min' =>13],
            [['seria_ci'], 'string', 'max' => 20],
        ];
    }

    // public function rules() 
    // { 
    //     return [
    //         [['nume', 'prenume', 'cnp_client', 'seria_ci', 'adresa', 'telefon'], 'required'],
    //         [['telefon'], 'integer'],
    //         [['nume'], 'string', 'max' => 50],
    //         [['prenume', 'adresa'], 'string', 'max' => 100],
    //         [['cnp_client'], 'string', 'max' => 13],
    //         [['seria_ci'], 'string', 'max' => 20]
    //     ]; 
    // } 

    public function validatorNume($attribute,$params)
    {
        $nume = $this->nume;
        if(preg_match('/[^a-zA-Z]/', $nume))
        {
            $this->addError($attribute,'Numele trebuie sa contina doar liere.');
        }
    }
    public function validatorPrenume($attribute,$params)
    {
        $prenume = $this->prenume;
        if(preg_match('/[^a-zA-Z]/', $prenume))
        {
            $this->addError($attribute,'Numele trebuie sa contina doar liere.');
        }
    }
    public function validatorSeria($attribute,$params)
    {
        $seria_ci = $this->seria_ci;
        if(preg_match('/[^A-Za-z0-9\s]+$/', $seria_ci))
        {
            $this->addError($attribute,'Seria C.I. trebuei sa contina doar cifre si litere.');
        }
    }
    public function validatorTelefon($attribute,$params)
    {
        $telefon = $this->telefon;
        if(!ctype_digit($telefon))
        {
            $this->addError($attribute,'Numele trebuie sa contina doar liere.');
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'Id',
            'nume' => 'Nume',
            'prenume' => 'Prenume',
            'cnp_client' => 'Cnp Client',
            'seria_ci' => 'Seria CI',
            'adresa' => 'Adresa',
            'telefon' => 'Telefon',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmanetares()
    {
        return $this->hasMany(Amanetare::className(), ['id_client' => '_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanzareCumparares()
    {
        return $this->hasMany(VanzareCumparare::className(), ['id_client' => '_id']);
    }

    // public function calculDatorie()
    // {
    //     $clienti  =Clienti::find()->all();
    //     $suma_datorata=0;

    //     foreach ($clienti as $c) {
    //     $c_amanetare = Amanetare::find()->where(['id_client'=>  $c->_id])->all();
    //         foreach ($c_amanetare as $cp) {
    //              $tranzactie = Tranzactie::findOne(['cod_contract_amanetare'=>$cp->cod_contract]);
    //                 $suma_datorata=$cp->suma_datorata- $tranzactie->rata;
    //         }
           
    //         echo $cp->suma_datorata;
    //         echo $tranzactie->rata;
    //     }

    // }

    public function calculDatorie($_id)
    {
        $suma_datorata=0;
        $client = Clienti::findOne(['_id'=>$_id]);
        $amanetari = Amanetare::find()->where(['id_client'=>  $client->_id])->all();                         
        foreach ($amanetari as $a) {
        $tranzactie = Tranzactie::find()->where(['cod_contract_amanetare'=>  $a->cod_contract])->all();  
        //$suma_datorata = $a->suma_datorata;
           // return $t->tip_tranzactie;
            $tPlata = Tranzactie::find()->where(['cod_contract_amanetare'=>  $a->cod_contract,'tip_tranzactie' => 'Plata finala'])->all();                         
            $tRata = Tranzactie::find()->where(['cod_contract_amanetare'=>  $a->cod_contract, 'tip_tranzactie' => 'Rata'])->all();
            $rata=0;
            $plata=0;
                $arr_length=count($tRata);
            for($i=0;$i<$arr_length;$i++)
            {
                $rata = $rata+ $tRata[$i]->suma;
            }
            $plata =0;
            $arr_length2=count($tPlata);
            for($i=0;$i<$arr_length2;$i++)
            {
                $plata =$tPlata[$i]->suma;
            }

            if($plata ==0)
            {
                $suma_datorata=$a->suma_datorata-$rata;
            }
            else
            {
                $suma_datorata=$a->suma_datorata-$plata;
            }

            return $suma_datorata;



            }
            
        }
      
        
    }
