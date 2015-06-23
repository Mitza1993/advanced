<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clienti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'nume') ?>

    <?= $form->field($model, 'prenume') ?>

    <?= $form->field($model, 'cnp_client') ?>

    <?= $form->field($model, 'seria_ci') ?>

    <?php // echo $form->field($model, 'adresa') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
