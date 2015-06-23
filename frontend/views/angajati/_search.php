<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Angajati_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="angajati-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_angajat') ?>

    <?= $form->field($model, 'nume') ?>

    <?= $form->field($model, 'prenume') ?>

    <?= $form->field($model, 'adresa') ?>

    <?= $form->field($model, 'cnp') ?>

    <?php // echo $form->field($model, 'seria') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'data_angajarii') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
