<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use  frontend\models\Produse;
use frontend\models\Clienti;
use frontend\controllers\ProduseController;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amanetare-form row">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>
    <div class="row">
        <div class="col-md-6">
         <?=  $form->field($model, 'id_client')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Clienti::find()->all(),'_id','prenume','nume'),
    'language' => 'en',
    'options' => ['placeholder' => 'Cautati dupa umele clientului'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>
      <?php  
    $produss= ProduseController::findModel($model->cod_produs);

    echo  $form->field($produss, 'denumire')->textInput(['readonly'=>true])->label('Denumirea produsului');
     ?>

     

    

     <?= $form->field($model, 'alte_specificatii')->textarea(['rows' => 6]) ?>
    </div>


     <div class="col-md-6"> 
     <?= $form->field($model, 'suma_acordata')->textInput() ?>

    
    

     


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
