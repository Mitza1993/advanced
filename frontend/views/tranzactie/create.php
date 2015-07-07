<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie */

<<<<<<< HEAD

=======
$this->title = 'Tranzactie noua';
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
//$this->params['breadcrumbs'][] = ['label' => 'Tranzactii', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzactie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'client' => $client
    ]) ?>

</div>
