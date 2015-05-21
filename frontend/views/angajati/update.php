<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Angajati */

$this->title = 'Update Angajati: ' . ' ' . $model->cod_angajat;
//$this->params['breadcrumbs'][] = ['label' => 'Angajatis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_angajat, 'url' => ['view', 'id' => $model->cod_angajat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="angajati-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
