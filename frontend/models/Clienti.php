<?php

namespace frontend\models;

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
            [['nume', 'prenume', 'cnp_client', 'seria_ci', 'adresa', 'telefon'], 'required'],
            [['telefon'], 'integer'],
            [['nume'], 'string', 'max' => 50],
            [['prenume', 'adresa'], 'string', 'max' => 100],
            [['cnp_client'], 'string', 'max' => 13,'min' =>13],
            [['seria_ci'], 'string', 'max' => 20]
        ];
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
}
