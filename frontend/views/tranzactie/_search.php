<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzactie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'cod_contract_amanetare') ?>

    <?= $form->field($model, 'suma') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'tip_tranzactie') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
