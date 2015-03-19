<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_cards".
 *
 * @property string $id
 * @property string $work_order_id
 * @property integer $number
 * @property string $aircraft_part_type
 * @property string $originator
 * @property string $date
 * @property string $title
 * @property string $discrepancy
 * @property string $rectification
 * @property integer $independent_check_required
 * @property integer $modification_report_required
 * @property integer $sdr_required
 *
 * @property WorkOrders $workOrder
 */
class WorkCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_order_id', 'number', 'aircraft_part_type', 'originator', 'date', 'title', 'discrepancy', 'rectification', 'independent_check_required', 'modification_report_required', 'sdr_required'], 'required'],
            [['work_order_id', 'number', 'independent_check_required', 'modification_report_required', 'sdr_required'], 'integer'],
            [['date'], 'safe'],
            [['discrepancy', 'rectification'], 'string'],
            [['aircraft_part_type'], 'string', 'max' => 250],
            [['originator'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_order_id' => 'Work Order ID',
            'number' => 'Work card number',
            'aircraft_part_type' => 'Aircraft Part Type',
            'originator' => 'Originator',
            'date' => 'Date',
            'title' => 'Work card brief discrepancy',
            'discrepancy' => 'Discrepancy',
            'rectification' => 'Rectification',
            'independent_check_required' => 'Independent Check Required',
            'modification_report_required' => 'Modification Report Required',
            'sdr_required' => 'Sdr Required',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOrder()
    {
        return $this->hasOne(WorkOrders::className(), ['id' => 'work_order_id']);
    }
}
