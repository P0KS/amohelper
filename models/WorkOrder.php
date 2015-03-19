<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_orders".
 *
 * @property string $id
 * @property string $date
 * @property string $number
 * @property string $registration
 * @property integer $serial_number
 * @property double $total_time
 * @property double $total_cycles
 * @property double $engine_tt
 * @property double $propeller_tt
 * @property string $manuals_note
 * @property integer $logbook_discepancys
 * @property string $logbook_discepancys_note
 * @property integer $paper_work_completed
 * @property string $paper_work_completed_notes
 * @property integer $independent_checks_accomplished
 * @property string $independent_checks_accomplished_notes
 * @property integer $modification_report_completed
 * @property string $modification_report_completed_notes
 * @property integer $aca_number
 * @property string $accomplishement_verification_date
 *
 * @property WorkCards[] $workCards
 * @property WorkOrdersManuals[] $workOrdersManuals
 */
class WorkOrder extends \yii\db\ActiveRecord
{
    public $manuals_field;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registration', 'serial_number',  'logbook_discepancys',  'aca_number'], 'required'],
            [['date', 'number', 'accomplishement_verification_date', 'manuals_note', 'manuals_field','logbook_discepancys_note', 'paper_work_completed_notes', 'independent_checks_accomplished_notes', 'modification_report_completed_notes' ], 'safe'],
            [['logbook_discepancys', 'paper_work_completed', 'independent_checks_accomplished', 'modification_report_completed', 'aca_number'], 'integer'],
            [['logbook_discepancys_note'], 'string'],
            [['number', 'manuals_note', 'paper_work_completed_notes', 'independent_checks_accomplished_notes', 'modification_report_completed_notes'], 'string', 'max' => 255],
            [['serial_number','registration', 'total_time', 'total_cycles', 'engine_tt', 'propeller_tt'], 'string', 'max' => 50],
            [['accomplishement_verification_date'], 'date', 'format' => 'yyyy-M-d'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id', //automatic
            'date' => 'Date', //automatic
            'number' => 'Work order number',//automatic
            'registration' => 'Registration or P/N',
            'serial_number' => 'S/N',
            'total_time' => 'Total time',
            'total_cycles' => 'Total cycles',
            'engine_tt' => 'Engine TT',
            'propeller_tt' => 'Propeller TT',
            'manuals_note' => 'Note',
            'logbook_discepancys' => 'Logbook discepancys',
            'logbook_discepancys_note' => 'Note',
            'paper_work_completed' => 'All required paper work completed',
            'paper_work_completed_notes' => 'Notes',
            'independent_checks_accomplished' => 'All required independent checks accomplished',
            'independent_checks_accomplished_notes' => 'Notes',
            'modification_report_completed' => 'All required major repair or modification report Completed',
            'modification_report_completed_notes' => 'Notes',
            'aca_number' => 'ACA #',
            'accomplishement_verification_date' => 'Work order accomplishement verification date',
            'manuals_field' => 'Manuals'
        ];
    }


    public function save($runValidation = true, $attributeNames = null) {
        if($this->isNewRecord) {
            $this->date = date('Y-m-d');
            $count = WorkOrder::find()->count();
            $this->number = date('Y') . "-" . ($count + 1);
        }
        parent::save($runValidation, $attributeNames);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkCards()
    {
        return $this->hasMany(WorkCard::className(), ['work_order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOrdersManuals()
    {
        return $this->hasMany(WorkOrderManual::className(), ['work_orders_id' => 'id']);
    }
}
