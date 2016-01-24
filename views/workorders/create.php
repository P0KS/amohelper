<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkOrder */

$this->title = 'Create a work order';
$this->params['breadcrumbs'][] = ['label' => 'Work orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'manualsModel' => $manualsModel,
        'aircraftModel' => $aircraftModel
    ]) ?>

</div>
