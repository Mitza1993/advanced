<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tranzactie;
<<<<<<< HEAD
use frontend\models\Produse;
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
use frontend\models\Tranzactie_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Amanetare;
use frontend\models\Clienti;
<<<<<<< HEAD
use frontend\controllers\ProduseController;
use \DateTime;
use \mPDF;
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

/**
 * TranzactieController implements the CRUD actions for Tranzactie model.
 */
class TranzactieController extends Controller
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
     * Lists all Tranzactie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Tranzactie_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2($cod_contract)
    {

        $searchModel = new Tranzactie_Search();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams,$cod_contract);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tranzactie model.
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
     * Creates a new Tranzactie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cod_contract)
    {
        $model = new Tranzactie();
        $model->cod_contract_amanetare=$cod_contract;

<<<<<<< HEAD
         if(Yii::$app->request->isAjax && $model->load($_POST))
        {
            Yii::$app->response->format='json';
            return \yii\widgets\ActiveForm::validate($model);
        }

=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
        $client = Amanetare::find()->where(['cod_contract' => $cod_contract])->one()->id_client;
        $client = Clienti::find()->where(['_id' => $client])->one();
        $client = $client->nume .' '.$client->prenume;

<<<<<<< HEAD
        $contract = Amanetare::find()->where(['cod_contract' => $cod_contract])->one();

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
                $produs = ProduseController::findModel($contract->cod_produs);
                $produs->situatie = 'in stoc';
                if(!$produs->update()) {
                    var_dump($produs->errors);
                }
            } else if($zile <= 30 && $tranzactie_prelungire != 0 && $tranzactie->suma == $contract->comisionul_lunar){
                $data_tranzactie_prelungire = new DateTime($tranzactie->data);

                $zile = $today->diff($data_tranzactie_prelungire)->format("%a");

                if($zile > 30) {
                    $produs = ProduseController::findModel($contract->cod_produs);
                    $produs->situatie = 'in stoc';
                    if(!$produs->update()) {
                        var_dump($produs->errors);
                    }                    
                }
            }
        } else {
            $produs = ProduseController::findModel($contract->cod_produs);
            $produs->situatie = 'returnat';
            if(!$produs->update()) {    
                var_dump($produs->errors);
            }
        }

=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'client' => $client
            ]);
        }
    }

    /**
     * Updates an existing Tranzactie model.
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
     * Deletes an existing Tranzactie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
<<<<<<< HEAD
        $model=$this->findModel($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index2','cod_contract'=>$model->cod_contract_amanetare]);
=======
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
    }

    /**
     * Finds the Tranzactie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tranzactie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tranzactie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
<<<<<<< HEAD


    public function actionCreatepdf4($_id){
        $mpdf=new mPDF('utf-8', 'A4-L');
        ob_start();
        $this->renderPDF4($_id);
        $mpdf->WriteHTML(ob_get_clean());
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }

    private function renderPDF4($_id) {

        
        $tranzactie = Tranzactie::find()->where(['_id'=>$_id])->one();
        $contract = Amanetare::find()->where(['cod_contract' => $tranzactie->cod_contract_amanetare])->one();

        $client = Clienti::find()->where(['_id'=>$contract->id_client])->one();
        $data = null;

        $data['_id']=$tranzactie->_id;
        $data['data']=$tranzactie->data;
        $data['suma']=$tranzactie->suma .' de lei';
        if($tranzactie->tip_tranzactie == 'Prelungire')
        {
            $data['tip_tranzactie']='prelungirea cu 30 de zile';
        }
        else
        if($tranzactie->tip_tranzactie == 'Rata')
        {
            $data['tip_tranzactie']='rata';
        }
        else
        if($tranzactie->tip_tranzactie == 'Plata finala')
        {
            $data['tip_tranzactie']='plata finala';
        }
        $data['client']=$client->getNumePrenume();
        $data['adresa']=$client->adresa;

        // array_push($raport, $data);

        // var_dump($raport); die();
        echo $this->renderPartial('tranzactie-pdf', ['data' => $data]);
    }
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
}
