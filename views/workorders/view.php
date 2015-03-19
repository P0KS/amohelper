<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Work orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'number',
            'registration',
            'serial_number',
            'total_time',
            'total_cycles',
            'engine_tt',
            'propeller_tt',
            'manuals_note',
            'logbook_discepancys',
            'logbook_discepancys_note:ntext',
            'paper_work_completed',
            'paper_work_completed_notes',
            'independent_checks_accomplished',
            'independent_checks_accomplished_notes',
            'modification_report_completed',
            'modification_report_completed_notes',
            'aca_number',
            'accomplishement_verification_date',
        ],
    ]) ?>

</div>
