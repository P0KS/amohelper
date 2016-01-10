<?php

namespace app\controllers;

use Yii;
use app\components\BaseController;
use app\models\WorkOrder;
use app\models\WorkCard;
use app\models\WorkOrderSearch;
use app\models\Manual;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkOrdersController implements the CRUD actions for WorkOrder model.
 */
class WorkCardsController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'index', 'delete'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }
    
    public function actionCreate($work_order_id)
    {
        $model = new WorkCard();
        
        $workOrderModel = WorkOrder::findOne( $work_order_id );
        
        $model->work_order_id = $work_order_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'workOrderModel' => $workOrderModel
            ]);
        }
    }
}
