<?php

namespace frontend\models;

use Yii;
use frontend\controllers\UserController;

/**
 * This is the model class for table "angajati".
 *
 * @property integer $cod_angajat
 * @property string $nume
 * @property string $prenume
 * @property string $adresa
 * @property string $cnp
 * @property string $seria
 * @property string $telefon
 * @property string $data_angajarii
 * @property integer $id_user
 *
 * @property Amanetare[] $amanetares
 * @property User $idUser
 * @property VanzareCumparare[] $vanzareCumparares
 */
class Angajati extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'angajati';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nume', 'prenume', 'adresa', 'cnp', 'seria', 'telefon', 'data_angajarii', 'id_user'], 'required'],
            [['telefon', 'id_user'], 'integer'],
            [['data_angajarii'], 'safe'],
            [['nume', 'prenume'], 'string', 'max' => 50],
            [['adresa'], 'string', 'max' => 100],
            [['cnp'], 'string', 'max' => 13],
            [['seria'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_angajat' => 'Cod Angajat',
            'nume' => 'Nume',
            'prenume' => 'Prenume',
            'adresa' => 'Adresa',
            'cnp' => 'Cnp',
            'seria' => 'Seria',
            'telefon' => 'Telefon',
            'data_angajarii' => 'Data Angajarii',
            'id_user' => 'Username',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmanetares()
    {
        return $this->hasMany(Amanetare::className(), ['cod_angajat' => 'cod_angajat']);
    }


    public function getNumePrenume()
    {
        return $this->nume . ' '. $this->prenume;
    }

 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanzareCumparares()
    {
        return $this->hasMany(VanzareCumparare::className(), ['cod_angajat' => 'cod_angajat']);
    }

     public function getUserName($id)
    {
        
        $user = UserController::findModel($id);
        $username = $user->username;
        return $username;
    }
}
