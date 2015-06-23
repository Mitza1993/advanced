<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\models\Clienti;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Amanetare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracte de amanetare';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amanetare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id_client',
                'value'=>'idClient.nume',
            ],
            [
                'attribute'=>'cod_produs',
                'value'=>'codProdus.denumire',
            ],
            'data_incheierii',
            'data_rambursarii',
            'suma_acordata',
             'suma_datorata',
             ['attribute' => 'Tranzactii',
                'format' => 'raw',
                'value' => function ($model) {                      
     return '<div>'.Html::a('+', ['tranzactie/create','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-default ad-tranzactie']) .'</div>'.
       '<div style="margin-top:20px;">'.Html::a('Tranzactii', ['tranzactie/index2','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-success']) .'</div>';
                },],

            // 'comisionul_lunar',
            // 'alte_specificatii:ntext',
            // 'cod_produs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
