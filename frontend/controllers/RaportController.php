<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Produse;
use frontend\models\Produse_Search;
use frontend\models\Amanetare;
use frontend\models\Amanetare_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\AmanetareController;
use frontend\models\Raport;
use yii\db\Query;
use yii\helpers\Json;
use mPDF;
use frontend\models\Tranzactie;

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


    public function actionRaportClienti() {
        $searchModel = new Amanetare_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('raport-clienti.php', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);


    }


    public function actionRaportAmanet()
    {
        return $this->render('raport-total.php');
    }

    public function actionGetRaport() {

        $startDate = $_POST['begin-date'];
        $endDate = $_POST['end-date'];

        $query = new Query();

        $query
            ->select(['amanetare.cod_contract', 'amanetare.suma_acordata', 'amanetare.suma_datorata', 'amanetare.data_incheierii','tranzactie.tip_tranzactie', 'SUM(tranzactie.suma) as suma_primita'])
            ->from('amanetare')
            ->join('JOIN', 'tranzactie', 'amanetare.cod_contract = tranzactie.cod_contract_amanetare')
            ->where('amanetare.data_incheierii between "'.$startDate.' 00:00:00" and "'.$endDate.' 23:59:59"')
            ->groupBy("amanetare.cod_contract");

        $command = $query->createCommand();
        $data = $command->queryAll();   

        return Json::encode($data);

    }

    public function actionGetSuma() {
        $startDate = $_POST['begin-date'];
        $endDate = $_POST['end-date'];

        $query = new Query();

        $query
            ->select(['suma_acordata', 'suma_datorata'])
            ->from('amanetare')
            ->where('data_incheierii between "'.$startDate.' 00:00:00" and "'.$endDate.' 23:59:59"');

        $command = $query->createCommand();
        $data = $command->queryAll();   

        return Json::encode($data);
    }

    public function actionGetVanzari() {
        $startDate = $_POST['begin-date2'];
        $endDate = $_POST['end-date2'];

        $query = new Query();

        $query
            ->select(['suma_contractata', 'tip_tranzactie'])
            ->from('vanzare_cumparare')
            ->where('data_inchieierii between "'.$startDate.' 00:00:00" and "'.$endDate.' 23:59:59"');

        $command = $query->createCommand();
        $data = $command->queryAll();   

        return Json::encode($data);        
    }

    

    
    public function actionGetProduse()
    {

        
        $query = new Query();

        $query
        ->select(['*'])
        ->from('produse');

        $command = $query->createCommand();
        $data = $command->queryAll();   

      
       return Json::encode($data);

    }

    

    public function actionCreatepdf(){
        $mpdf=new mPDF('utf-8', 'A4-L');
        ob_start();
        $this->renderPDF();
        $mpdf->WriteHTML(ob_get_clean());
        $mpdf->Output();
        exit; 
       
    }
    

    private function renderPDF() {

        $raport = array();

        $contracte = Amanetare::find()->all();

        foreach ($contracte as $key => $value) {
            $model = new Amanetare();

            $data = array();

            $data['client'] = $model->getClientNume($value->id_client);
            $data['angajat'] = $model->getAngajat($value->cod_angajat);

            $tranzactii = Tranzactie::find()->where(['cod_contract_amanetare' => $value->cod_contract])->all();

            $suma = 0;
            foreach ($tranzactii as $key => $tranzactie) {
                $suma += $tranzactie->suma;
            }

            $data['suma_datorata'] = $value->suma_datorata;

            $data['suma_primita'] = $suma;

            $data['rest_de_plata'] = $data['suma_datorata'] - $data['suma_primita'];

            $data['data'] = $value->data_incheierii;
            $data['cod_contract']=$value->cod_contract;

            array_push($raport, $data);

        }

        echo $this->renderPartial('raport-pdf', ['raport' => $raport]);
    }

}




?>