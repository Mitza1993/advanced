<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Clienti;
use frontend\models\Clienti_Search;
use frontend\models\LogStergere;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Amanetare;
use frontend\models\VanzareCumparare;
/**
 * ClientiController implements the CRUD actions for Clienti model.
 */
class ClientiController extends Controller
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
        ];
    }

    /**
     * Lists all Clienti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Clienti_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Clienti model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $contract_V = VanzareCumparare::find()->where(['id_client'=>$id])->all();
        $contract_A = Amanetare::find()->where(['id_client'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model2'=>$contract_A,
            'model3'=>$contract_V,
        ]);
    }

    /**
     * Creates a new Clienti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clienti();

        if(Yii::$app->request->isAjax && $model->load($_POST))
        {
            Yii::$app->response->format='json';
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Clienti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Clienti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $logModel = new LogStergere();
        $logModel->id_angajat = Yii::$app->user->id;
        $logModel->value = $id;
        var_dump($logModel->type); die();
        $logModel->type = LogStergere::typeClient;
        if(!$logModel->save()) {
            var_dump($logModel->errors); die();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clienti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clienti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Clienti::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


   
}
