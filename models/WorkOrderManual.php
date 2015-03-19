<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_orders_manuals".
 *
 * @property string $work_orders_id
 * @property string $manuals_id
 *
 * @property WorkOrders $workOrders
 * @property Manuals $manuals
 */
class WorkOrderManual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_orders_manuals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_orders_id', 'manuals_id'], 'required'],
            [['work_orders_id', 'manuals_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'work_orders_id' => 'Work Orders ID',
            'manuals_id' => 'Manuals ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOrders()
    {
        return $this->hasOne(WorkOrder::className(), ['id' => 'work_orders_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManuals()
    {
        return $this->hasOne(Manual::className(), ['id' => 'manuals_id']);
    }
}
