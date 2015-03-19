<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Work orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-order-index">

    <h1>Work orders</h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a work order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            'registration',
            'serial_number',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {export}',
                'buttons' => [
                    'export' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-share"></span>', $url, [
                            'title' => 'Export',
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if($action === 'update') {
                        return Yii::$app->getUrlManager()->createUrl(['workorders/update', 'id' => $model->id]);
                    }
                    if ($action === 'delete') {
                        return Yii::$app->getUrlManager()->createUrl(['workorders/delete', 'id' => $model->id]);
                    }
                    if($action === 'export') {
                        return Yii::$app->getUrlManager()->createUrl(['workorders/export', 'id' => $model->id]);
                    }
                }
            ]
        ],
    ]); ?>

</div>