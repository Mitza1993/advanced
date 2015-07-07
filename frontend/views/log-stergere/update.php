<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LogStergere */

$this->title = 'Update Log Stergere: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Stergeres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="log-stergere-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
