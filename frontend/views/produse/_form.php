<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Produse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produse-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
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

         <?= $form->field($model, 'file')->fileInput() ?>
     <?php 
     if($model->file)
     {
      echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->file.'" width="90px">&nbsp;&nbsp;&nbsp;';
     // echo Html::a
     }
     ?>
     <div class="row">
                       <?= Html::submitButton($model->isNewRecord ? 'Adauga produs' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
     </div>   
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
