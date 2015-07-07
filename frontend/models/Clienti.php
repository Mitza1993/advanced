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
<<<<<<< HEAD

=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
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

<<<<<<< HEAD
            //[['telefon'], 'integer','message' =>' Teelefonul trebuie sa contina doar cifre.'],
=======
            [['telefon'], 'integer','message' =>' Teelefonul trebuie sa contina doar cifre.'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            [['nume'], 'string', 'max' => 50],
            ['nume','validatorNume'],
            ['prenume','validatorPrenume'],
            ['seria_ci','validatorSeria'],
            ['telefon','validatorTelefon'],
<<<<<<< HEAD
            ['telefon','validTelefon'],
            [['prenume', 'adresa'], 'string', 'max' => 100],
           // [['cnp_client'], 'string', 'max' => 13,'min' =>13],
            ['cnp_client','validCNP'],
=======
            [['prenume', 'adresa'], 'string', 'max' => 100],
            [['cnp_client'], 'string', 'max' => 13,'min' =>13],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            [['seria_ci'], 'string', 'max' => 20],
        ];
    }

<<<<<<< HEAD

   public function validareCNP($p_cnp) {
    // CNP must have 13 characters
        $p_cnp=$this->cnp_client;
    if(strlen($p_cnp) != 13) {
        return false;
    }
    $cnp = str_split($p_cnp);
    unset($p_cnp);
    $hashTable = array( 2 , 7 , 9 , 1 , 4 , 6 , 3 , 5 , 8 , 2 , 7 , 9 );
    $hashResult = 0;
    // All characters must be numeric
    for($i=0 ; $i<13 ; $i++) {
        if(!is_numeric($cnp[$i])) {
            return false;
        }
        $cnp[$i] = (int)$cnp[$i];
        if($i < 12) {
            $hashResult += (int)$cnp[$i] * (int)$hashTable[$i];
        }
    }
    unset($hashTable, $i);
    $hashResult = $hashResult % 11;
    if($hashResult == 10) {
        $hashResult = 1;
    }
    // Check Year
    $year = ($cnp[1] * 10) + $cnp[2];
    switch( $cnp[0] ) {
        case 1  : case 2 : { $year += 1900; } break; // cetateni romani nascuti intre 1 ian 1900 si 31 dec 1999
        case 3  : case 4 : { $year += 1800; } break; // cetateni romani nascuti intre 1 ian 1800 si 31 dec 1899
        case 5  : case 6 : { $year += 2000; } break; // cetateni romani nascuti intre 1 ian 2000 si 31 dec 2099
        case 7  : case 8 : case 9 : {                // rezidenti si Cetateni Straini
            $year += 2000;
            if($year > (int)date('Y')-14) {
                $year -= 100;
            }
        } break;
        default : {
            return false;
        } break;
    }
    return ($year > 1800 && $year < 2099 && $cnp[12] == $hashResult);
}

    function validare_nr_tel($nr) 
{
   return preg_match('/^\(?07\d{2}\)?[-\s]?\d{3}[-\s]?\d{3}$/', $nr) ? true : false;
}

  public function validCNP($attribute,$params)
    {
        $stare = $this->validareCNP($this->cnp_client);
        if(!$stare)
        {
            $this->addError($attribute,'CNP-ul nu are formatul corect');
        }
    }

    public function validTelefon($attribute,$params)
    {
        $stare = $this->validare_nr_tel($this->telefon);
        if(!$stare)
        {
            $this->addError($attribute,'Telefonul nu este corect.');
        }
    }
=======
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
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

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
<<<<<<< HEAD
            $this->addError($attribute,'Prenumele trebuie sa contina doar liere.');
=======
            $this->addError($attribute,'Numele trebuie sa contina doar liere.');
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
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
<<<<<<< HEAD
            $this->addError($attribute,'Numarul trebuie sa contina doar cifre.');
=======
            $this->addError($attribute,'Numele trebuie sa contina doar liere.');
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
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
<<<<<<< HEAD
            'cnp_client' => 'Cnp',
=======
            'cnp_client' => 'Cnp Client',
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            'seria_ci' => 'Seria CI',
            'adresa' => 'Adresa',
            'telefon' => 'Telefon',
        ];
    }

<<<<<<< HEAD
    public function getNumePrenume()
    {
        return $this->nume. ' '.$this->prenume;
    }

=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

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

<<<<<<< HEAD
=======
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
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

    public function calculDatorie($_id)
    {
        $suma_datorata=0;
        $client = Clienti::findOne(['_id'=>$_id]);
        $amanetari = Amanetare::find()->where(['id_client'=>  $client->_id])->all();                         
        foreach ($amanetari as $a) {
        $tranzactie = Tranzactie::find()->where(['cod_contract_amanetare'=>  $a->cod_contract])->all();  
<<<<<<< HEAD
        
=======
        //$suma_datorata = $a->suma_datorata;
           // return $t->tip_tranzactie;
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
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
<<<<<<< HEAD
        
        public function areContractA($id)
        {
            $contracte = Amanetare::find()->where(['id_client'=>$id])->one();
            if(is_null($contracte))
            {
                return false;
            }
            else
            {
                return true;
            }

        }

        public function areContractVZ($id)
        {
            $contracte = VanzareCumparare::find()->where(['id_client'=>$id])->one();
            if(is_null($contracte))
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        
        
        
        
    
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
      
        
    }
