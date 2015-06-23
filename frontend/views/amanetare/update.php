<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */

$this->title = 'Modifica contractul nr: ' . ' ' . $model->cod_contract;
//$this->params['breadcrumbs'][] = ['label' => 'Contracte de amanet', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->cod_contract, 'url' => ['view', 'id' => $model->cod_contract]];
//$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="amanetare-update">


	
    <h1><?= Html::encode($this->title) ?></h1>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
