<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Amanetare;
use frontend\models\Amanetare_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Angajati;
use frontend\models\Produse;
use frontend\models\Tranzactie;

/**
 * AmanetareController implements the CRUD actions for Amanetare model.
 */
class AmanetareController extends Controller
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
     * Lists all Amanetare models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Amanetare_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Amanetare model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Amanetare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


     






    public function actionCreate()
    {
        $model = new Amanetare();

        if ($model->load(Yii::$app->request->post())){

        $angajat = Angajati::find()->where(['id_user' => \Yii::$app->user->id])->one();
    $model->cod_angajat = $angajat->cod_angajat;

          $model->save(); 

            $produs = ProduseController::findModel($model->cod_produs);
            $produs->situatie="sub amanetare";
            $produs->save();




            return $this->redirect(['view', 'id' => $model->cod_contract]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Amanetare model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod_contract]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Amanetare model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Amanetare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Amanetare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Amanetare::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
