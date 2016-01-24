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
                        <?php $options = \yii\helpers\ArrayHelper::map($aircraftModel, 'id', 'registration'); ?>
                        <?= $form->field($model, 'aircraft_id')->dropDownList(
                            $options,           // Flat array ('id'=>'label')
                            ['prompt'=>'']    // options
                        ); ?>
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
        <div class="panel panel-default" ng-controller="WorkCardsController" ng-init="init()">
            <div class="panel-heading"><strong>Work cards</strong></div>
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" ng-model="currentDiscrepancy" placeholder="Discrepancy" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" ng-model="currentRectification" placeholder="Rectification" />
                    </div>                    
                </div>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label>
                            <input type="checkbox" ng-model="currentIndependentCheck" />
                            Independent check required
                        </label>
                    </div>
                    <div class="col-xs-4">
                        <label>
                            <input type="checkbox" ng-model="currentMajorRepair"  />
                            Major repair or modification report required
                        </label>
                    </div>
                    <div class="col-xs-4">
                        <label>
                            <input type="checkbox" ng-model="currentSDR" />
                            SDR required
                        </label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <a class="btn btn-success" ng-click="addWorkCard()">Add work card</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-3">Discrepancy</th>
                        <th class="col-md-4">Rectification</th>
                        <th class="col-md-3">Options</th>
                        <th class="col-md-1">Actions</th>
                    </tr>                    
                    <tr ng-repeat="workCard in workCards">
                        <td><?= $model->isNewRecord ? '' : $model->number . '-'; ?>{{$index + 1}}</td>
                        <td>{{workCard.discrepancy}}</td>
                        <td>{{workCard.rectification}}</td>
                        <td>
                            <span ng-if="workCard.independent_check_required">Independent check required <br /></span>
                            <span ng-if="workCard.modification_report_required">Major repair or modification report required <br /></span>
                            <span ng-if="workCard.srd_required">SDR required</span>
                        </td>
                        <td>
                            <a href="javascript:void(0);" title="Update">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="javascript:void(0);" title="Delete" ng-click="deleteWorkCard($index)">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>      
                </table>
            </div>
        </div>
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
            <div class="panel-heading"><strong>Work order accomplishment verification</strong></div>
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
