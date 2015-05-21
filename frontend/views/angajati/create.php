<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Angajati */

$this->title = 'Adauga angajati';
//$this->params['breadcrumbs'][] = ['label' => 'Angajatis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angajati-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         ]) ?>

</div>
