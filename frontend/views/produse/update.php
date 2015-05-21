<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Produse */

$this->title = 'Modifica produsul ' . ' ' ;
//$this->params['breadcrumbs'][] = ['label' => 'Produse', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->_cod, 'url' => ['view', 'id' => $model->_cod]];
//$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="produse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
