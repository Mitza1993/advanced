<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LogStergere */

$this->title = 'Create Log Stergere';
$this->params['breadcrumbs'][] = ['label' => 'Log Stergeres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-stergere-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
