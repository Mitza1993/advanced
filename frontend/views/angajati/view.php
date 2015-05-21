<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Angajati */

$this->title = $model->nume . $model->prenume;
//$this->params['breadcrumbs'][] = ['label' => 'Angajatis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angajati-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->cod_angajat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->cod_angajat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sunteti sigur ca vreti sa stergeti angajatul?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'cod_angajat',
            'nume',
            'prenume',
            'adresa',
            'cnp',
            'seria',
            'telefon',
            'data_angajarii',
            [
                'attribute'=>'id_user',
                'value'=> $model->getUsername($model->cod_angajat),
            ],
        ],
    ]) ?>

</div>
