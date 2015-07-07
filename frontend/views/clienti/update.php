<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti */

<<<<<<< HEAD
$this->title = 'Modificare date client: ' . ' ' . $model->_id;
=======
$this->title = 'Update Clienti: ' . ' ' . $model->_id;
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
//$this->params['breadcrumbs'][] = ['label' => 'Clientis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => $model->_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clienti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
