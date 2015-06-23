<?php

use yii\helpers\Html;
use frontend\controllers\ClientiController;
use kartik\grid\GridView;
use frontend\models\VanzareCumparare;
use frontend\controllers\AngajatiController;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Vanzare_Cumparare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="vanzare-cumparare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
        'rowOptions' => function($model)
        {
            if($model->tip_tranzactie == 'Vanzare')
            {
                return ['class' =>'success'];
            }
            
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id_client',
                'value'=>function($model){
                    $client = ClientiController::findModel($model->id_client);
                    return $client->nume.' '.$client->prenume;
                },
                'footer'=>'Total',
            ],
            [
                'attribute'=>'cod_produs',
                'value'=> 'codProdus.denumire',
            ],

            [
            'attribute'=>'cod_angajat',
                'value'=>function($model){
                    $angajat = AngajatiController::findModel($model->cod_angajat);
                    return $angajat->nume.' '.$angajat->prenume;

                },
            ],
             //'tip_tranzactie',
             'data_inchieierii',
            // 'alte_specificatii:ntext',
             //'suma_contractata',
             [
    'attribute' => 'suma_contractata',
   // 'format' => "raw",
    'footer'=>VanzareCumparare::getTotal($dataProvider->models,'suma_contractata'),
],
        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
