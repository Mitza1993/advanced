<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Produse;
use frontend\models\Produse_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\AmanetareController;
use frontend\models\Raport;



class RaportController extends Controller
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
        
        $model = new Raport();
            return $this->render('index', [
            'model' => $model,]);
           
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


}




?>