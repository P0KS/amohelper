<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkOrder */
/* @var $form yii\widgets\ActiveForm */
$nullableBoolOptions = array('1' => 'Yes', '2' => 'No', '' => 'N/A');
?>

<div class="work-order-form" xmlns="http://www.w3.org/1999/html">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->hasErrors()): ?>
    <div class="row">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <?php endif;?>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><strong><?= $model->isNewRecord ? "New work card" : "Work card # " . $model->number;?></strong></div>
            <div class="panel-body">
                
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
