<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "produse".
 *
 * @property integer $_cod
 * @property string $denumire
 * @property string $tip
 * @property string $unitate
 * @property integer $cantitate
 * @property string $caracteristici
 * @property string $stare
 * @property string $situatie
 *
 * @property Amanetare[] $amanetares
 * @property VanzareCumparare[] $vanzareCumparares
 */
class Produse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;


    public static function tableName()
    {
        return 'produse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['denumire', 'tip', 'unitate', 'cantitate', 'caracteristici', 'stare', 'situatie'], 'required','message'=>' Campul {attribute} nu poate fi gol.'],
            [['tip', 'unitate', 'caracteristici', 'stare'], 'string'],
<<<<<<< HEAD
            [['cantitate'], 'number','message'=>'Cantitatea este de tip numeric.'],
=======
            [['cantitate'], 'integer','message'=>'Cantitatea este de tip numeric.'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            [['file'],'safe'],
            [['file'],'file','extensions' =>'jpg,gif,png'],
            [['denumire', 'situatie'], 'string', 'max' => 50]
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_cod' => 'Cod',
            'denumire' => 'Denumire',
            'tip' => 'Tip',
            'unitate' => 'Unitate',
            'cantitate' => 'Cantitate',
            'caracteristici' => 'Caracteristici',
            'stare' => 'Stare',
            'situatie' => 'Situatie',
            'file' => 'Imagine',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmanetares()
    {
        return $this->hasMany(Amanetare::className(), ['cod_produs' => '_cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanzareCumparares()
    {
        return $this->hasMany(VanzareCumparare::className(), ['cod_produs' => '_cod']);
    }

    public function getDenumire()
    {
        return $this->denumire;
    }

<<<<<<< HEAD


    public function areContractA($cod)
        {
            $contracte = Amanetare::find()->where(['cod_produs'=>$cod])->one();
            if(is_null($contracte))
            {
                return false;
            }
            else
            {
                return true;
            }

        }

        public function areContractVZ($cod)
        {
            $contracte = VanzareCumparare::find()->where(['cod_produs'=>$cod])->one();
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
