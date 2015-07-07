<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tranzactie */

$this->title ='Tranzactia nr. :'. $model->_id;
//$this->params['breadcrumbs'][] = ['label' => 'Tranzacties', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzactie-view col-md-6 col-md-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <table align="center" class="table table-bordered">
        <tr>
            <td align="center"><b>Click  Export pentru printare</b></td>
            <td align="center">
                <?= Html::a('Export', ['tranzactie/createpdf4','_id'=>$model->_id], ['class'=>'btn btn-primary','target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Will open the generated PDF file in a new window']);?>
            </td>
        </tr>
    </table>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'cod_contract_amanetare',
            'suma',
            'data',
            'tip_tranzactie',
        ],
    ]) ?>

</div>
