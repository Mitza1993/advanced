<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

<<<<<<< HEAD
$this->title = 'Cerere email pentru resetare parola';
=======
$this->title = 'Request password reset';
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

<<<<<<< HEAD
    <p>Introduceti-va adresa de email pentru resetarea parolei.</p>
=======
    <p>Please fill out your email. A link to reset password will be sent there.</p>
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email') ?>
                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
