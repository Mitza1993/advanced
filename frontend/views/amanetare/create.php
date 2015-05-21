<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */


$this->title = 'Contract nou';
//$this->params['breadcrumbs'][] = ['label' => 'Contracte de amanet', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amanetare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
