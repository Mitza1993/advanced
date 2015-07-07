<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\controllers\ProduseController;
use frontend\controllers\AngajatiController;
use frontend\controllers\ClientController;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LogStergere_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Log Stergeres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-stergere-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Log Stergere', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'id_angajat',
            //'value',
            'timestamp',
            //'type',

            ['attribute'=>'Operatii stergere',
            'format'=>'raw',
            'value'=>function($model)
            {
              $angajat =AngajatiController::findModel($model->id_angajat); 
                if($model->type ==0)
                {
                   // $produs =ProduseController::findModel($model->value); 
                    return 'La data de '. $model->timestamp. ' angajatul '. $angajat->getNumePrenume() . ' a sters un produs. ';
                }
                else
                    if($model->type ==1)
                {   
    
                        return 'La data de '. $model->timestamp. ' angajatul '. $angajat->getNumePrenume() . ' a sters un client. ';
                }
                
            },],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
