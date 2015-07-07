<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Angajati */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="angajati-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nume')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'prenume')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'adresa')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'cnp')->textInput(['maxlength' => 13]) ?>

    <?= $form->field($model, 'seria')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'data_angajarii')->textInput(['class'=> 'has-datepicker']) ?>



    <?= $form->field($model, 'id_user')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adauga' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
