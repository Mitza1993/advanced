<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Produse */

$this->title = $model->denumire;
$this->params['breadcrumbs'][] = ['label' => 'Produse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->_cod], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->_cod], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sunteti sigur ca vreti sa stergeti produsul?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'denumire',
            'tip',
            'unitate',
            'cantitate',
            'caracteristici:ntext',
            'stare',
            'situatie',
            [
    'attribute'=>'Imagine',
    'format' =>'html',
    'value'=>\yii\helpers\Html::img($model->foto,['width'=>'120','height'=>'120','id'=>'foto'])
]
        ],
    ]) ?>

</div>
