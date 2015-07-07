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
use frontend\controllers\ProduseController;
use mPDF;
use \DateTime;

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

        $contracte = Amanetare::find()->all();

        foreach ($contracte as $key => $contract) {

            $cod_contract = $contract->cod_contract;

            $tranzactii = Tranzactie::find()->where(['cod_contract_amanetare' => $cod_contract])->all();

            $suma_platita = 0;
            $tranzactie_prelungire = 0;

            foreach ($tranzactii as $key => $value) {
                if($value->tip_tranzactie != 'Prelungire') {
                    $suma_platita = $value->suma;
                } else {
                    $tranzactie_prelungire = 1;
                    $tranzactie = $value;
                }
            }

            if($suma_platita != $contract->suma_datorata) {
                $today = new DateTime('now');
                $data_incheierii = new Datetime($contract->data_incheierii);

                $zile = $today->diff($data_incheierii)->format("%a");

                if($zile > 30 && $tranzactie_prelungire == 0) {
                    $produs = Produse::find()->where(['_cod' => $contract->cod_produs])->one();
                    $produs->situatie = 'in stoc';
                    if(!$produs->update()) {
                       // var_dump($produs->errors);
                    }
                }
            } else {
                $produs = ProduseController::findModel($contract->cod_produs);
                $produs->situatie = 'returnat';
                if(!$produs->update()) {    
                    // var_dump($produs->errors);
                }
            }

        }

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


/// update dupa save
    public function actionCreate($cod_produs)
    {
    
        $model = new Amanetare();
        $produs2 = ProduseController::findModel($cod_produs);
        
        $model->cod_produs=$produs2->_cod;

        if(Yii::$app->request->isAjax && $model->load($_POST))
        {
            Yii::$app->response->format='json';
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())){

            $angajat = Angajati::find()->where(['id_user' => \Yii::$app->user->id])->one();
            $model->cod_angajat = $angajat->cod_angajat;
           $model->suma_datorata=$model->suma_acordata + $model->comisionul_lunar + floatval(($model->suma_acordata *3/100));

            $model->save();


            $produs = ProduseController::findModel($model->cod_produs);
            $produs->situatie="amanetare";
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


    public function actionCreatepdf3($cod_contract){
        $mpdf=new mPDF('utf-8', 'A4-L');
        ob_start();
        $this->renderPDF3($cod_contract);
        $mpdf->WriteHTML(ob_get_clean());
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }
    

    private function renderPDF3($cod_contract) {

        

        $contract = Amanetare::find()->where(['cod_contract' => $cod_contract])->one();

        $data = null;

        $data['cod_contract']=$contract->cod_contract;
        $data['angajat']=$contract->getAngajat($contract->cod_angajat);
        $data['client_nume']=$contract->getClientNume($contract->id_client);
        $data['client_adresa']=$contract->getClientAdresa($contract->id_client);
        $data['client_serie']=$contract->getClientSerie($contract->id_client);
        $data['suma_acordata']=$contract->suma_acordata;
        $data['comision']=$contract->comisionul_lunar;
        $data['suma_datorata']=$contract->suma_datorata;
        $data['data_incheierii']=$contract->data_incheierii;
        $data['produs_denumire']=$contract->getProdusDenumire($contract->cod_produs);
        $data['produs_um']=$contract->getProdusUM($contract->cod_produs);
        $data['produs_cantitate']=$contract->getProdusCantitate($contract->cod_produs);
        // array_push($raport, $data);

        // var_dump($raport); die();
        echo $this->renderPartial('amanetare-pdf', ['data' => $data]);
    }



}
