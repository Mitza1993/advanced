<?php

namespace frontend\controllers;

use Yii;
use frontend\models\VanzareCumparare;
use frontend\models\Angajati;
use frontend\models\Produse;
use frontend\models\VanzareCumparare_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VanzareCumparareController implements the CRUD actions for VanzareCumparare model.
 */
class VanzareCumparareController extends Controller
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
     * Lists all VanzareCumparare models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VanzareCumparare_Search();
       

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2()
    {
        $searchModel = new VanzareCumparare_Search();
       
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);
            return $this->render('index2.php', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VanzareCumparare model.
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
     * Creates a new VanzareCumparare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($cod_produs)
    {
        $model = new VanzareCumparare();
        $produs = ProduseController::findModel($cod_produs);
        $model->cod_produs=$produs->_cod;



        if ($model->load(Yii::$app->request->post()))  {
            $angajat = Angajati::find()->where(['id_user' => \Yii::$app->user->id])->one();
            $model->cod_angajat = $angajat->cod_angajat;
           
            

            
                $model->save();
            
            if($model->tip_tranzactie=="Vanzare")
            {
                $produs->situatie="vandut";
            }
            else if ($model->tip_tranzactie=="Cumparare")
            {
                $produs->situatie="in stoc";
            }
            
            $produs->save();


            
            return $this->redirect(['view', 'id' => $model->cod_contract]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VanzareCumparare model.
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
    
    public function actionContractDetail() {
    if (isset($_POST['cod_contract'])) {
        $model = \frontend\models\VanzareCumparare::findOne($_POST['cod_contract']);
        return $this->renderPartial('index', ['model'=>$model]);
    } else {
        return '<div class="alert alert-danger">No data found</div>';
    }
}

    /**
     * Deletes an existing VanzareCumparare model.
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
     * Finds the VanzareCumparare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VanzareCumparare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VanzareCumparare::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
