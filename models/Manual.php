<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manuals".
 *
 * @property string $id
 * @property string $name
 *
 * @property WorkOrdersManuals[] $workOrdersManuals
 */
class Manual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manuals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOrdersManuals()
    {
        return $this->hasMany(WorkOrdersManuals::className(), ['manuals_id' => 'id']);
    }
}
