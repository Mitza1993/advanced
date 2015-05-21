<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Tranzactie_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tranzactii efectuate';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzactie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'cod_contract_amanetare',
                'value'=>'codContractAmanetare.idClient.nume',
            ],
            [
                'attribute'=>'_id',
                'value'=>'codContractAmanetare.idClient.prenume',
            ],
            'suma',
            'data',
            'tip_tranzactie',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
