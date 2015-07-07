<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Vanzare_Cumparare */

$this->title = 'Contract de '. $model->tip_tranzactie. ' nr: '.$model->cod_contract;
if($model->tip_tranzactie =='Vanzare')
{
 $this->params['breadcrumbs'][] = ['label'=>'Contracte','url'=>['vanzare-cumparare/index2']];   
}
else
{
    $this->params['breadcrumbs'][] = ['label'=>'Contracte','url'=>['vanzare-cumparare/index']];
}

//$this->params['breadcrumbs'][] = ['label' => 'Vanzare  Cumparares', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vanzare-cumparare-view col-md-6 col-md-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <table align="center" class="table table-bordered">
        <tr>
            <td align="center"><b>Click  Export pentru printare</b></td>
            <td align="center">
                <?= Html::a('Export', ['vanzare-cumparare/createpdf5','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-primary','target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Will open the generated PDF file in a new window']);?>
            </td>
        </tr>
    </table>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codProdus.denumire',
            'idClient.nume',
            'codAngajat.nume',
            'data_inchieierii',
            'suma_contractata',
            'tip_tranzactie',
            'alte_specificatii:ntext',
        ],
    ]) ?>

</div>
