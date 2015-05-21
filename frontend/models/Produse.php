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
            [['denumire', 'tip', 'unitate', 'cantitate', 'caracteristici', 'stare', 'situatie'], 'required'],
            [['tip', 'unitate', 'caracteristici', 'stare'], 'string'],
            [['cantitate'], 'integer'],
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
}
