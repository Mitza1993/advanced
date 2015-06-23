<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Clienti_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clienti';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clienti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       // 'model' => $model,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nume',
            'prenume',
            'cnp_client',
            //'seria_ci',
            // 'adresa',
             'telefon',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
