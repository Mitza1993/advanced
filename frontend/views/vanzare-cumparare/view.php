<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Vanzare_Cumparare */

$this->title = 'Contract de '. $model->tip_tranzactie. ' nr: '.$model->cod_contract;
//$this->params['breadcrumbs'][] = ['label' => 'Vanzare  Cumparares', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vanzare-cumparare-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->cod_contract], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->cod_contract], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sunteti sigur ca doriti stergerea contractului?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codProdus.denumire',
            'idClient.nume',
            'codAngajat.nume',
            'data_inchieierii',
            'suma_contractata',
            'tip_tranzactie',
            'alte_specificatii:ntext',
        ],
    ]) ?>

</div>
