<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "log_stergere".
 *
 * @property integer $id
 * @property integer $id_angajat
 * @property integer $value
 * @property string $timestamp
 * @property integer $type
 */
class LogStergere extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    const typeClient = 0;
    const typeProdus = 1;
    public static function tableName()
    {
        return 'log_stergere';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_angajat', 'value', 'type'], 'required'],
            [['id_angajat', 'value', 'type'], 'integer'],
            [['timestamp'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_angajat' => 'Id Angajat',
            'value' => 'Value',
            'timestamp' => 'Timestamp',
            'type' => 'Type',
        ];
    }

    
}
