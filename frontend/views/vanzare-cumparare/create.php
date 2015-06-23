<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\VanzareCumparare */

$this->title = 'Contract nou';
//$this->params['breadcrumbs'][] = ['label' => 'Vanzare Cumparares', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vanzare-cumparare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
