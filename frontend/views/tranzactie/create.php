<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie */


//$this->params['breadcrumbs'][] = ['label' => 'Tranzactii', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzactie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'client' => $client
    ]) ?>

</div>
