<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Tranzactie;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clienti */

$this->title = $model->nume ." ". $model->prenume;
//$this->params['breadcrumbs'][] = ['label' => 'Clientis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="clienti-view col-md-6 col-md-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cnp_client',
            'seria_ci',
            'adresa',
            'telefon',
            
        ],
    ]) ?>



    <?php 
         if($model->areContractA($model->_id)== true || $model->areContractVZ($model->_id)==true)
         {
           if($model->areContractVZ($model->_id)== true )
           {
            foreach ($model3 as $key => $value) { ?>
            <table class="table table-condensed mytable">
                <th class="danger mytable"text-align="center"colspan="3"><b>Contractul nr. <?php echo $value->cod_contract?></b></th>
                <tr class="active">
                    <td>Data incheierii</td>
                    <td>Suma contractata</td>
                    <td>Tipul contractului</td>

                </tr>
                <tr>
                    <td><?php echo $value->data_inchieierii?></td>
                    <td><?php echo $value->suma_contractata. ' lei'?></td>
                    <td><?php echo $value->tip_tranzactie?></td>
                </tr>
            </table>




          <?php  } }  
                if($model->areContractA($model->_id)== true )
                    {
            foreach ($model2 as $key => $value2) { 
                    $tranzactii = Tranzactie::find()->where(['cod_contract_amanetare'=>$value2->cod_contract])->all();
                ?>
                <table class="table table-striped mytable">
                    <th class="info mytable"text-align="center"colspan="4"><b>Contractul de amanetare nr. <?php echo $value2->cod_contract?></b></th>
                    <tr class="active">
                    <td>Data incheierii</td>
                    <td>Suma acordata</td>
                    <td>Suma datorata</td>
                    <td>Comisionul lunar</td>
                </tr>
                <tr>
                    <td><?php echo $value2->data_incheierii.' lei'?></td>
                    <td><?php echo $value2->suma_acordata.' lei'?></td>
                    <td><?php echo $value2->suma_datorata.' lei'?></td>
                    <td><?php echo $value2->comisionul_lunar .' lei'?></td>
                </tr>

                <?php   
                    foreach ($tranzactii as $key => $tranzactie) {  
                        ?>
                        <th class="success"colspan="4"><b>Tranzactia nr. <?php echo $tranzactie->_id ?> </b></th>
                        <tr class="active">
                            <td>Tranzactia nr. <?php echo $tranzactie->_id?> </td>
                            <td>Suma</td>
                            <td>Tipul platii</td>
                            <td>Data efectuarii platii</td>
                        </tr>
                        <tr >
                            <td></td>
                            <td><?php echo $tranzactie->suma . ' lei'?></td>
                            <td><?php echo $tranzactie->tip_tranzactie?></td>
                            <td><?php echo $tranzactie->data?></td>
                        </tr>
                   <?php  }

                } ?>
                
                </table>

            <?php }} ?>
            
            
           


    


    

</div>


<style type="text/css">
    .mytable
    {
        text-align: center;
        margin-top: 40px;
    }

</style>