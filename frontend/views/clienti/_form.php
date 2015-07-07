<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clienti-form">
<<<<<<< HEAD
 <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>
=======
 <?php $form = ActiveForm::begin(); ?>
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
<div class="row">
    <div class="col-md-6">
     <?= $form->field($model, 'nume')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'prenume')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'cnp_client')->textInput(['maxlength' => 13]) ?>   
    </div>
     <div class="col-md-6">
     <?= $form->field($model, 'seria_ci')->textInput(['maxlength' => 20]) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'adresa')->textInput(array('maxlength' => 100,'placeHolder'=>'Judet,Oras,Strada,nr.,bl.,ap.')) ?>
=======
    <?= $form->field($model, 'adresa')->textInput(['maxlength' => 100]) ?>
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

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
