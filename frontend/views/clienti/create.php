<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti */

$this->title = 'Adaugare Client';
//$this->params['breadcrumbs'][] = ['label' => 'Clienti', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clienti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2'=>$model2,
        'model3S'=>$model3,
    ]) ?>

</div>
