<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */

$this->title ="Contract de amanetare nr: ". $model->cod_contract;
//$this->params['breadcrumbs'][] = ['label' => 'Contracte de amanet', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD
<div class="amanetare-view col-md-6 col-md-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Export', ['amanetare/createpdf3','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-primary','target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Will open the generated PDF file in a new window']) ?>

    
    
=======
<div class="amanetare-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->cod_contract], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->cod_contract], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        [
                'label' =>'Numele clientului',
<<<<<<< HEAD
                'value' =>$model->getClientNume($model->id_client),
=======
                'value' =>$model->getClient($model->id_client),
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            ],
            [
                'label' =>'Numele angajatului',
                'value' =>$model->getAngajat($model->cod_angajat),
            ],
            'data_incheierii',
            'suma_acordata',
            [
                'label' =>'Denumire produs',
<<<<<<< HEAD
                'value' =>$model->getProdusDenumire($model->cod_produs),
            ],
            
            'suma_datorata',
        
=======
                'value' =>$model->getProdus($model->cod_produs),
            ],
            
            'suma_datorata',
            'data_rambursarii',
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            'comisionul_lunar',
            'alte_specificatii:ntext',
        ],
    ]) ?>

</div>
