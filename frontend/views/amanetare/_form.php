<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use  frontend\models\Produse;
use frontend\models\Clienti;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amanetare-form row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
         <?= $form->field($model, 'id_client')->dropDownList(
        ArrayHelper::map(Clienti::find()->all(),'_id','nume','prenume'))
        
     ?>
     <?php 
     $produss= new Produse();
    
    echo  $form->field($model, 'cod_produs')->dropDownList(ArrayHelper::map($produss::findBySql("SELECT * FROM Produse WHERE situatie ='in stoc'")->all(),'_cod','denumire'),
        ['prompt'=>'Selectati produsul']);
     ?>

     <?= $form->field($model, 'alte_specificatii')->textarea(['rows' => 6]) ?>
    </div>

    

     <div class="col-md-6"> 
     <?= $form->field($model, 'suma_acordata')->textInput() ?>

    <?= $form->field($model, 'suma_datorata')->textInput() ?>

    <?= $form->field($model, 'data_rambursarii')->textInput() ?>

    <?= $form->field($model, 'comisionul_lunar')->textInput() ?>

    </div>
    </div>
    <div class="row">
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adauga' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
