<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Clienti;
use frontend\models\Produse;
use frontend\controllers\ProduseController;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model frontend\models\Vanzare_Cumparare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vanzare-cumparare-form row">

    <?php $form = ActiveForm::begin(); ?>

     <?=  $form->field($model, 'id_client')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Clienti::find()->all(),'_id','prenume','nume'),
    'language' => 'en',
    'options' => ['placeholder' => 'Cautati dupa numele clientului'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>


  <?= $form->field($model, 'tip_tranzactie')->dropDownList([ 'Vanzare' => 'Vanzare', 'Cumparare' => 'Cumparare', ], ['prompt' => '']); ?>

     <?php  
    $produss= ProduseController::findModel($model->cod_produs);

    echo  $form->field($produss, 'denumire')->textInput(['readonly'=>true])->label('Denumirea produsului');
     ?>

     <?= $form->field($model, 'alte_specificatii')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suma_contractata')->textInput() ?>

    </div>
    




   

    <div class="form-group">
     <?= Html::submitButton($model->isNewRecord ? 'Adauga' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
