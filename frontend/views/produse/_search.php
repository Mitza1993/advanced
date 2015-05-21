<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Produse_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_cod') ?>

    <?= $form->field($model, 'denumire') ?>

    <?= $form->field($model, 'tip') ?>

    <?= $form->field($model, 'unitate') ?>

    <?= $form->field($model, 'cantitate') ?>

    <?php // echo $form->field($model, 'caracteristici') ?>

    <?php // echo $form->field($model, 'stare') ?>

    <?php // echo $form->field($model, 'situatie') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
