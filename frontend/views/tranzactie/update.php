<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie */

$this->title = 'Modifica tranzactia nr:'. $model->_id;
//$this->params['breadcrumbs'][] = ['label' => 'Tranzacties', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => $model->_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tranzactie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
