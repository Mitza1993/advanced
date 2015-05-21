<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\VanzareCumparare_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vanzare-cumparare-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_contract') ?>

    <?= $form->field($model, 'cod_angajat') ?>

    <?= $form->field($model, 'id_client') ?>

    <?= $form->field($model, 'cod_produs') ?>

    <?= $form->field($model, 'data_inchieierii') ?>

    <?php // echo $form->field($model, 'suma_contractata') ?>

    <?php // echo $form->field($model, 'tip_tranzactie') ?>

    <?php // echo $form->field($model, 'alte_specificatii') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
