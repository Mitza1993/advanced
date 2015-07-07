<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Produse;
use frontend\models\Produse_Search;

use frontend\models\LogStergere;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Amanetare;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * ProduseController implements the CRUD actions for Produse model.
 */
class ProduseController extends Controller
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
     * Lists all Produse models.
     * @return mixed
     */
    public function actionIndex()
    {

        if(isset($_POST['situatie']))
        {
            $situatie=$_POST['situatie'];


            if($situatie == 'amanetare' || $situatie == 'vandut') {
                $actions = 0;
                $delete = 0;
            } else 
            {
            if($situatie == 'amanetat' || $situatie == 'vandut') {
                $actions = 0;
                $delete = 0;
            } else {
                $actions = 1;
                $delete = 1;
            }


           
           
            $searchModel = new Produse_Search();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$situatie);
            $data['html'] = $this->renderPartial('partialindex', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]);
            $data['actions'] = $actions;
            $data['hasDelete'] = $delete;

            return Json::encode($data);

        }
        else
        {
            $situatie = 'in stoc';

          

            $searchModel = new Produse_Search();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$situatie);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
       
    }


    // public function actionIndex2()
    // {
               
    //    $amanetare = new Amanetare();
    //   $amanetare->actualizareProduse();
    //     $searchModel = new Produse_Search();
    //     $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);
    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }
    // public function actionIndex3()
    // {
               
    //    $amanetare = new Amanetare();
    //    $amanetare->actualizareProduse();
    //     $searchModel = new Produse_Search();
    //     $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);
    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }


    public function sendProductID($id)
    {
        return $id;
        echo "Id-ul ". $id;
    }
    /**
     * Displays a single Produse model.
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
     * Creates a new Produse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produse();
     
        $model->situatie="in stoc";
        if ($model->load(Yii::$app->request->post())) {
            $model->file=UploadedFile::getInstance($model,'file');
            if($model->file)
            {
                $imagepath='images/';
                $model->foto= $imagepath . rand(10,100) . $model->file->name;
            }

            $model->save();
            if($model->file)
            {
                $model->file->saveAs($model->foto);
            }
            return $this->redirect(['view', 'id' => $model->_cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Produse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())  ) {
            $model->file=UploadedFile::getInstance($model,'file');
            if($model->file)
            {
                $imagepath='images/';
                $model->foto=$imagepath. rand (10,100). $model->file->name;
            }
            $model->save();
            if($model->file){
                $model->file->saveAs($model->foto);
            }
            return $this->redirect(['view', 'id' => $model->_cod]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Deletes an existing Produse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $logModel = new LogStergere();
        $logModel->id_angajat = Yii::$app->user->id;
        $logModel->value = $id;
        $logModel->type = LogStergere::typeProdus;
        if(!$logModel->save()) {
            var_dump($logModel->errors); die();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Produse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
