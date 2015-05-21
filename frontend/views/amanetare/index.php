<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Amanetare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracte de amanetare';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amanetare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Contract nou', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::button('Adauga tranzactie', ['value' => Url::to('index.php?r=tranzactie/create') ,'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header'=> '<h4>Tranzactie noua</h4>',
                'id'=>'modal',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
     ?>

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
             
            /* [
                'attribute' => 'Actiuni',
                'format' => 'raw',
                'value' => function ($model) {                      
                        return '<div>'.Html::button('Adauga tranzactie', ['value' => Url::to('index.php?r=tranzactie/create') ,'class' => 'btn btn-success','id'=>'modalButton']) .'</div>';
                },
            ],*/
            
            // 'comisionul_lunar',
            // 'alte_specificatii:ntext',
            // 'cod_produs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
