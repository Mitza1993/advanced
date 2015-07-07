<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amanetare */

$this->title ="Contract de amanetare nr: ". $model->cod_contract;
//$this->params['breadcrumbs'][] = ['label' => 'Contracte de amanet', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amanetare-view col-md-6 col-md-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Export', ['amanetare/createpdf3','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-primary','target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Will open the generated PDF file in a new window']) ?>

    
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        [
                'label' =>'Numele clientului',
                'value' =>$model->getClientNume($model->id_client),
            ],
            [
                'label' =>'Numele angajatului',
                'value' =>$model->getAngajat($model->cod_angajat),
            ],
            'data_incheierii',
            'suma_acordata',
            [
                'label' =>'Denumire produs',
                'value' =>$model->getProdusDenumire($model->cod_produs),
            ],
            
            'suma_datorata',
        
            'comisionul_lunar',
            'alte_specificatii:ntext',
        ],
    ]) ?>

</div>
