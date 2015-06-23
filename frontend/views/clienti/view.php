<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti */

$this->title = $model->nume ." ". $model->prenume;
//$this->params['breadcrumbs'][] = ['label' => 'Clientis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clienti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cnp_client',
            'seria_ci',
            'adresa',
            'telefon',
            
        ],
    ]) ?>

</div>
