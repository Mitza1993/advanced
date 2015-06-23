<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */

$this->title ="Contract de amanetare nr: ". $model->cod_contract;
//$this->params['breadcrumbs'][] = ['label' => 'Contracte de amanet', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amanetare-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->cod_contract], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->cod_contract], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        [
                'label' =>'Numele clientului',
                'value' =>$model->getClient($model->id_client),
            ],
            [
                'label' =>'Numele angajatului',
                'value' =>$model->getAngajat($model->cod_angajat),
            ],
            'data_incheierii',
            'suma_acordata',
            [
                'label' =>'Denumire produs',
                'value' =>$model->getProdus($model->cod_produs),
            ],
            
            'suma_datorata',
            'data_rambursarii',
            'comisionul_lunar',
            'alte_specificatii:ntext',
        ],
    ]) ?>

</div>
