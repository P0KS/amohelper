<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkOrder */

$this->title = 'Update work order: ' . ' ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Work orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="work-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'manualsModel' => $manualsModel,
        'aircraftModel' => $aircraftModel
    ]) ?>

</div>
