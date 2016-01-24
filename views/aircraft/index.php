<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AircraftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aircraft';
$this->params['breadcrumbs'][] = ['label' => 'Work orders', 'url' => ['workorders/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aircraft-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Aircraft', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'serial_number',
            'registration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
