<?php

use yii\helpers\Html;
use frontend\controllers\ClientiController;
use kartik\grid\GridView;
use frontend\models\Tranzactie;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Vanzare_Cumparare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<div class="vanzare-cumparare-index">

    <h1>Rapoarte clienti privind contractele de amanetare</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php 

    echo Html::a('Export as PDF', ['/raport/createpdf'], [
        'class'=>'btn btn-primary', 
        'target'=>'_blank', 
        'data-toggle'=>'tooltip', 
        'title'=>'Will open the generated PDF file in a new window'
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
        // 'rowOptions' => function($model)
        // {
        //     if($model->tip_tranzactie == 'Cumparare')
        //     {
        //         return ['class' =>'danger'];
        //     }
            
        // },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
       		[
       			'attribute' => 'nume client',
       			'value' => function($model)
                {
                    return $model->getClient($model->id_client);
                },
       		],
            [
                'attribute' => 'nume angajati',
                'value' => function($model)
                {
                    return $model->getAngajat($model->cod_angajat);
                },
            ],
       		"suma_datorata",
       		[
                'attribute'=>'suma primita',
                'value'=> function($model) {
                	$tranzactii = Tranzactie::find()->where(['cod_contract_amanetare' => $model->cod_contract])->all();

                	$suma = 0;
                	foreach ($tranzactii as $key => $value) {
                		$suma += $value->suma;
                	}

                	return $suma;
                },
       		],
       		[
                'attribute'=>'rest de plata',
                'value'=> function($model) {
                	$tranzactii = Tranzactie::find()->where(['cod_contract_amanetare' => $model->cod_contract])->all();

                	$suma = 0;
                	foreach ($tranzactii as $key => $value) {
                		$suma += $value->suma;
                	}

                	$suma_datorata = $model->suma_datorata;

                	return $suma_datorata - $suma;
                },
       		],
       		"data_incheierii",
                ],
    ]); ?>

</div>
