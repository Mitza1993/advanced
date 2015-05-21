<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amanetare-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_contract') ?>

    <?= $form->field($model, 'cod_angajat') ?>

    <?= $form->field($model, 'id_client') ?>

    <?= $form->field($model, 'data_incheierii') ?>

    <?= $form->field($model, 'suma_acordata') ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
