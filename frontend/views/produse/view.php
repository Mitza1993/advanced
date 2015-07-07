<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Produse */


$this->title = 'Produsul '. $model->denumire . ' a fost adaugat.';
$this->params['breadcrumbs'][] = ['label'=>'Clienti','url'=>['clienti/create']];
$this->params['breadcrumbs'][] = ['label' => 'Produse', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Adauga un alt produs', 'url' => ['produse/create']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produse-view col-md-6 col-md-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
<table class="table table-bordered">
    <tr>
        <td align="center" colspan="2">Selectati operatiunea dorita</td>
       
    </tr>
    <tr>
        <td align="center"align="center">        <?= Html::a('Vanzare-Cumparare', ['vanzare-cumparare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-success']);  ?>
</td>
        <td align="center">        <?=Html::a('Amanetare', ['amanetare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-warning']); ?>
</td>
    </tr>
</table>
    </p>


    

=======
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



=======
 
