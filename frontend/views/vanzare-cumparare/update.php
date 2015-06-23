<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VanzareCumparare */

$this->title = 'Update Vanzare Cumparare: ' . ' ' . $model->cod_contract;
$this->params['breadcrumbs'][] = ['label' => 'Vanzare Cumparares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_contract, 'url' => ['view', 'id' => $model->cod_contract]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vanzare-cumparare-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
