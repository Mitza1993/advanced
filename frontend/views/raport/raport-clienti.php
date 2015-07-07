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
<<<<<<< HEAD
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'cod contract',
                'value'=>function($model)
                {
                    return $model->cod_contract;
                },
            ],
=======
        // 'rowOptions' => function($model)
        // {
        //     if($model->tip_tranzactie == 'Cumparare')
        //     {
        //         return ['class' =>'danger'];
        //     }
            
        // },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
       		[
       			'attribute' => 'nume client',
       			'value' => function($model)
                {
<<<<<<< HEAD
                    return $model->getClientNume($model->id_client);
=======
                    return $model->getClient($model->id_client);
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
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
<<<<<<< HEAD
                        if($value->tip_tranzactie!='Prelungire')
                        {
                            $suma += $value->suma;
                        }
                		
=======
                		$suma += $value->suma;
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
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
<<<<<<< HEAD
           // "data_rambursarii",
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
                ],
    ]); ?>

</div>
