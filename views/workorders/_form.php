<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

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
            <div class="panel-heading"><strong><?= $model->isNewRecord ? "New work order" : "Work order # " . $model->number;?></strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'registration')->textInput(['maxlength' => 50]) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'serial_number')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'aircraft_part_type')->textInput() ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'total_time')->textInput() ?>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'total_cycles')->textInput() ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'engine_tt')->textInput() ?>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'propeller_tt')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if($model->isNewRecord) : ?>
        <div class="alert alert-info" role="alert">Discrepencies (work cards) will be added later on when the work order is created!</div>
        <?php elseif(isset($workCardsDataProvider)) : ?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Work cards</strong></div>
                <div class="panel-body">
                    <p>
                        <?= Html::a('Create a work card', ['workcards/create', 'work_order_id' => $model->id], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?= GridView::widget([
                        'dataProvider' => $workCardsDataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'title',
                            'number',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Manuals</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                        $options = \yii\helpers\ArrayHelper::map($manualsModel, 'id', 'name');
                        echo $form->field($model, 'manuals_field')->inline(true)->checkboxList($options, ['class' => 'checkbox-inline']);
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'manuals_note')->textInput(['maxlength' => 255]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Logbook</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                       <?= $form->field($model, 'logbook_discepancys')->checkbox() ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'logbook_discepancys_note')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Customer approval</strong></div>
            <div class="panel-body">
                <p>The Structural Aviation inc AMO does not take any responsibility about the planning of the maintenance
                    accomplished on this aircraft or these parts. It will be the entire responsibility of the owner for witch
                    task have to be accomplished. The AMO does only the requested maintenance tasks. No verification will
                    be done for life limited parts, AD’s or anything else if they are not previously requested by the owner
                    of the aircraft or part of it.  The customer gives up any legal appeal against the company or the owners.
                    The company reserves the right to hold (retain) the plane or a part to pay the completed amount of the invoice.
                    If the invoice is not paid in full after a period of three months, starting at the billing date, the aircraft or
                    the componente becomes the proprety of  Structural Aviation. By signing this contract, the owner or his representative
                    acceptes all conditions listed above.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Work order accomplishement verification</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'paper_work_completed')->inline(true)->radioList($nullableBoolOptions, ['class' => 'radio-inline']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'paper_work_completed_notes')->textInput(['maxlength' => 255]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'independent_checks_accomplished')->inline(true)->radioList($nullableBoolOptions, ['class' => 'radio-inline']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'independent_checks_accomplished_notes')->textInput(['maxlength' => 255]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'modification_report_completed')->inline(true)->radioList($nullableBoolOptions, ['class' => 'radio-inline']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'modification_report_completed_notes')->textInput(['maxlength' => 255]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <?= $form->field($model, 'aca_number')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <?= $form->field($model, 'accomplishement_verification_date')->textInput(['class' => 'form-control js-datepicker']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
