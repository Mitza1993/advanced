<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clienti-form">
 <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>
<div class="row">
    <div class="col-md-6">
     <?= $form->field($model, 'nume')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'prenume')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'cnp_client')->textInput(['maxlength' => 13]) ?>   
    </div>
     <div class="col-md-6">
     <?= $form->field($model, 'seria_ci')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'adresa')->textInput(array('maxlength' => 100,'placeHolder'=>'Judet,Oras,Strada,nr.,bl.,ap.')) ?>


    <?= $form->field($model, 'telefon')->textInput(['maxlength' => 20]) ?>
     </div>

</div>
<div class="row">
    <div class="form-group" style="margin-left:550px;">
        <?= Html::submitButton($model->isNewRecord ? 'Adauga client' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
    </div>

</div>

   

   

   

    
    <?php ActiveForm::end(); ?>

</div>
