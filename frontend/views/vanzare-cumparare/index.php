<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Vanzare_Cumparare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracte incheiate';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vanzare-cumparare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Contract nou', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model)
        {
            if($model->tip_tranzactie == 'Cumparare')
            {
                return ['class' =>'danger'];
            }
            else if($model->tip_tranzactie =="Vanzare")
            {
                return ['class'=>'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id_client',
                'value'=>'idClient.nume',
            ],
            [
                'attribute'=>'cod_produs',
                'value'=> 'codProdus.denumire',
            ],
             'tip_tranzactie',
             'data_inchieierii',
            // 'alte_specificatii:ntext',
             'suma_contractata',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
