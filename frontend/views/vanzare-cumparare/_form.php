<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Clienti;
use frontend\models\Produse;
use frontend\controllers\ProduseController;


/* @var $this yii\web\View */
/* @var $model frontend\models\Vanzare_Cumparare */
/* @var $form yii\widgets\ActiveForm */
?>

<head>
<link rel="stylesheet" type="text/css" href="/web/css/site.css">
</head>

<div class="vanzare-cumparare-form row">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->dropDownList(
        ArrayHelper::map(Clienti::find()->all(),'_id','prenume','nume'),
        ['prompt'=>'Selectati clientul'])
        
     ?>
              <?= $form->field($model, 'tip_tranzactie')->dropDownList([ 'Vanzare' => 'Vanzare', 'Cumparare' => 'Cumparare', ], ['prompt' => '']); ?>


     <?php  
    $produss= new Produse();
    echo  $form->field($model, 'cod_produs')->dropDownList(ArrayHelper::map($produss::findBySql("SELECT * FROM Produse WHERE situatie ='in stoc'")->all(),'_cod','denumire'),
        ['prompt'=>'Selectati produsul'])
     ?>

     <?= $form->field($model, 'alte_specificatii')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suma_contractata')->textInput() ?>
                        <?= Html::submitButton($model->isNewRecord ? 'Adauga' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success  btn-lg ' : 'btn btn-primary']) ?>



    <div class="col-md-6">
        
    
    </div>
    <div class="col-md-6">

    

    <div class="btn-vc">

    </div>


    </div>


    




   

    <div class="form-group">
    </div>

    <?php ActiveForm::end(); ?>

</div>
