<?php

namespace frontend\controllers;

use Yii;
use frontend\models\VanzareCumparare;
use frontend\models\Angajati;
use frontend\models\Produse;

use frontend\models\Clienti;
use frontend\models\VanzareCumparare_Search;
use frontend\controllers\ClientiController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

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



    public function actionCreatepdf(){
        $mpdf=new mPDF('utf-8', 'A4-L');
        ob_start();
        $this->renderPDF();
        $mpdf->WriteHTML(ob_get_clean());
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }

    private function renderPDF() {

        $raport = array();

            $contracte = VanzareCumparare::find()->where(['tip_tranzactie' => 'Cumparare'])->all();

            //var_dump($contracte); die();
        foreach ($contracte as $key => $value) {



            $model1 = new Clienti();
            $model2 = new Angajati();
            $model3 = new Produse();

            $data = array();
            //var_dump($value->id_client); die();
            $data['cod_contract']=$value->cod_contract;
            $data['client'] = $value->getClienti($value->id_client);
            $data['angajat'] = $value->getAngajati($value->cod_angajat);

             $data['produs'] = $value->getProdus($value->cod_produs);
            

            $data['data_inchieierii'] = $value->data_inchieierii;

            $data['suma_contractata'] = $value->suma_contractata ." lei";

            //var_dump($value->data_inchieierii);
            array_push($raport, $data);

        }

        echo $this->renderPartial('cumparare-pdf', ['raport' => $raport]);
    }

    public function actionCreatepdf2(){
        $mpdf=new mPDF('utf-8', 'A4-L');
        ob_start();
        $this->renderPDF2();
        $mpdf->WriteHTML(ob_get_clean());
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }

    private function renderPDF2() {

        $raport = array();

            $contracte = VanzareCumparare::find()->where(['tip_tranzactie' => 'Vanzare'])->all();

            //var_dump($contracte); die();
        foreach ($contracte as $key => $value) {

            


            $data = array();
            //var_dump($value->id_client); die();
            $data['cod_contract']=$value->cod_contract;
            $data['client'] = $value->getClienti($value->id_client);
            $data['angajat'] = $value->getAngajati($value->cod_angajat);

             $data['produs'] = $value->getProdus($value->cod_produs);
            

            $data['data_inchieierii'] = $value->data_inchieierii;

            $data['suma_contractata'] = $value->suma_contractata ." lei";

            //var_dump($value->data_inchieierii);
             
             array_push($raport, $data);

        }
       // var_dump($data['total']); die();
        

        echo $this->renderPartial('vanzare-pdf', ['raport' => $raport]);
    }


     public function actionCreatepdf5($cod_contract){
        $mpdf=new mPDF('utf-8', 'A4-L');
        ob_start();
        $this->renderPDF5($cod_contract);
        $mpdf->WriteHTML(ob_get_clean());
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }
    

    private function renderPDF5($cod_contract) {

        $data=null;

        $contract = VanzareCumparare::find()->where(['cod_contract' => $cod_contract])->one();
        if($contract->tip_tranzactie=='Cumparare')
        {
            $data['vanzator']=$contract->getClientNume($contract->id_client);
            $data['vanzator_adresa']=$contract->getClientAdresa($contract->id_client);
            $data['vanzator_serie']=$contract->getClientSerie($contract->id_client);
            $data['cumparator']=$contract->getAngajat($contract->cod_angajat);
            $data['cumparator_adresa']=$contract->getAngajatAdresa($contract->cod_angajat);
            $data['cumparator_serie']=$contract->getAngajatSerie($contract->cod_angajat);
            $data['cumparator_info']='Reprezentant al firmei SC. AimAmanet. SRL cu sediul in judetul Arges,Str.Calea Dragasani nr.2';
            $data['suma']=$contract->suma_contractata;
            $data['produs_denumire']=$contract->getProdusDenumire($contract->cod_produs);
            $data['produs_um']=$contract->getProdusUM($contract->cod_produs);
            $data['produs_cantitate']=$contract->getProdusCantitate($contract->cod_produs);
            $data['produs_stare']=$contract->getProdusStare($contract->cod_produs);
            $data['produs_cod']=$contract->getProdusCod($contract->cod_produs);
            $data['produs_tip']=$contract->getProdusTip($contract->cod_produs);
            $data['data_incheierii']=$contract->data_inchieierii;
            //var_dump($data); die();
        }
        else
        {
            $data['cumparator']=$contract->getClientNume($contract->id_client);
            $data['cumparator_adresa']=$contract->getClientAdresa($contract->id_client);
            $data['cumparator_serie']=$contract->getClientSerie($contract->id_client);
            $data['vanzator']=$contract->getAngajat($contract->cod_angajat);
            $data['vanzator_adresa']=$contract->getAngajatAdresa($contract->cod_angajat);
            $data['vanzator_info']='Reprezentant al firmei SC. AimAmanet. SRL cu sediul in judetul Arges,Str.Calea Dragasani nr.2';
            $data['vanzator_serie']=$contract->getAngajatSerie($contract->cod_angajat);
            $data['suma']=$contract->suma_contractata;
            $data['produs_denumire']=$contract->getProdusDenumire($contract->cod_produs);
            $data['produs_um']=$contract->getProdusUM($contract->cod_produs);
            $data['produs_cantitate']=$contract->getProdusCantitate($contract->cod_produs);
            $data['produs_stare']=$contract->getProdusStare($contract->cod_produs);
            $data['produs_cod']=$contract->getProdusCod($contract->cod_produs);
            $data['produs_tip']=$contract->getProdusTip($contract->cod_produs);
            $data['data_incheierii']=$contract->data_inchieierii;
            // var_dump($data); die();
        }



        
        
           echo $this->renderPartial('contract_vz-pdf', ['data' => $data]);
        
        
    }






}
