<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Produse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produse-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'denumire')->textInput(['maxlength' => 50]) ?>

             <?= $form->field($model, 'tip')->dropDownList([ 'bijuterii' => 'Bijuterii', 'electronice' => 'Electronice', ], ['prompt' => '']) ?>
   
             <?= $form->field($model, 'stare')->dropDownList([ 'nou' => 'Nou', 'buna' => 'Buna', 'deteriorat' => 'Deteriorat', ], ['prompt' => '']) ?>

              <?= $form->field($model, 'unitate')->dropDownList([ 'gram' => 'Gram', 'buc' => 'Buc', ], ['prompt' => '']) ?>

        </div>
        <div class="col-md-6">

    <?= $form->field($model, 'cantitate')->textInput() ?>

    <?= $form->field($model, 'caracteristici')->textarea(['rows' => 6]) ?>

            <?= Html::submitButton($model->isNewRecord ? 'Adauga produs' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group">
    </div>
    </div>

   


    

    <?php ActiveForm::end(); ?>

</div>
