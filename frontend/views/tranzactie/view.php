<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie */

$this->title = $model->_id;
//$this->params['breadcrumbs'][] = ['label' => 'Tranzacties', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzactie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->_id], [
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
            '_id',
            'cod_contract_amanetare',
            'suma',
            'data',
            'tip_tranzactie',
        ],
    ]) ?>

</div>
