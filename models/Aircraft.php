<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aircraft".
 *
 * @property string $id
 * @property string $type
 * @property string $serial_number
 * @property string $registration
 *
 * @property WorkOrders[] $workOrders
 */
class Aircraft extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aircraft';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'serial_number', 'registration'], 'required'],
            [['type', 'registration'], 'string', 'max' => 50],
            [['serial_number'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'A/C type',
            'serial_number' => 'A/C serial number',
            'registration' => 'A/C registration',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOrders()
    {
        return $this->hasMany(WorkOrders::className(), ['aircraft_id' => 'id']);
    }
   
}
