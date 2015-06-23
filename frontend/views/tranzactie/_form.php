<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Amanetare;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzactie-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="text" value="<?php echo $client ?>" disabled>

    <?= $form->field($model, 'suma')->textInput() ?>

    <?= $form->field($model, 'data')->textInput(['class'=> 'has-datepicker']) ?>

    <?= $form->field($model, 'tip_tranzactie')->dropDownList([ 'Rata' => 'Rata', 'Plata finala' => 'Plata finala', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adauga' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
