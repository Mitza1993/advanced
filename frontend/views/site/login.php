<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD
<div class="site-login col-md-6 col-md-offset-3">
=======
<div class="site-login">
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Introduceti-va datele de logare:</p>

    <div class="row">
        <div class="col-xs-6">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                   Daca v-ati uitat parola o puteti reseta accesand acest <?= Html::a('link', ['site/request-password-reset']) ?>.
                </div>
<<<<<<< HEAD
                
            
        </div>
         <div class="col-xs-6">
         <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn-lg btn-success my-button', 'name' => 'login-button']) ?>
                </div>
        </div>
        <?php ActiveForm::end(); ?>
=======
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success my-button', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
    </div>
</div>
