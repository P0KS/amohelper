<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkOrder;

/**
 * WorkOrderSearch represents the model behind the search form about `app\models\WorkOrder`.
 */
class WorkOrderSearch extends WorkOrder
{
    public $search_field;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'logbook_discepancys', 'paper_work_completed', 'independent_checks_accomplished', 'modification_report_completed', 'aca_number'], 'integer'],
            [['date', 'number', 'registration', 'serial_number', 'manuals_note', 'logbook_discepancys_note', 'paper_work_completed_notes', 'independent_checks_accomplished_notes', 'modification_report_completed_notes', 'accomplishement_verification_date'], 'safe'],
            [['total_time', 'total_cycles', 'engine_tt', 'propeller_tt'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search_field' => 'Search', //automatic
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WorkOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        $query->andFilterWhere([
            'id' => $this->search_field,
            'date' => $this->search_field,
            'total_time' => $this->search_field,
            'total_cycles' => $this->search_field,
            'engine_tt' => $this->search_field,
            'propeller_tt' => $this->search_field,
            'logbook_discepancys' => $this->search_field,
            'paper_work_completed' => $this->search_field,
            'independent_checks_accomplished' => $this->search_field,
            'modification_report_completed' => $this->search_field,
            'aca_number' => $this->search_field,
            'accomplishement_verification_date' => $this->search_field,
        ]);

        $query->andFilterWhere(['like', 'number', $this->search_field])
            ->andFilterWhere(['like', 'registration', $this->search_field])
            ->andFilterWhere(['like', 'serial_number', $this->search_field])
            ->andFilterWhere(['like', 'manuals_note', $this->search_field])
            ->andFilterWhere(['like', 'logbook_discepancys_note', $this->search_field])
            ->andFilterWhere(['like', 'paper_work_completed_notes', $this->search_field])
            ->andFilterWhere(['like', 'independent_checks_accomplished_notes', $this->search_field])
            ->andFilterWhere(['like', 'modification_report_completed_notes', $this->search_field]);

        return $dataProvider;
    }
}
