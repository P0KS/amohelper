<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkOrder */

$this->title = 'Create a work card for work order : ' . $workOrderModel->number;
$this->params['breadcrumbs'][] = ['label' => 'Work orders', 'url' => ['workorders/index']];
$this->params['breadcrumbs'][] = ['label' => $workOrderModel->number, 'url' => ['workorders/update', 'id' => $model->work_order_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'workOrderModel' => $workOrderModel
    ]) ?>

</div>
