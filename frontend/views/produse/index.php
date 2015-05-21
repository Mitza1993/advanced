<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Produse_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produse';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // '_cod',
            'denumire',
            'tip',
            'unitate',
            'cantitate',
            // 'caracteristici:ntext',
            // 'stare',
             'situatie',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
