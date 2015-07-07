<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\models\Clienti;
<<<<<<< HEAD
use frontend\models\Produse;
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Amanetare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracte de amanetare';
//$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD
<div class="amanetare-index ">
=======
<div class="amanetare-index">
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
<<<<<<< HEAD
            'cod_contract',
            [
                'attribute'=>'id_client',
                'value'=>'idClient.nume',
            ],[

                'attribute'=>'Prenume',
                'value'=>'idClient.prenume',
=======
            [
                'attribute'=>'id_client',
                'value'=>'idClient.nume',
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            ],
            [
                'attribute'=>'cod_produs',
                'value'=>'codProdus.denumire',
            ],
            'data_incheierii',
<<<<<<< HEAD
            'suma_acordata',
            'comisionul_lunar',
             'suma_datorata',
             ['attribute'=>'Zile ramase',
             'format'=>'raw',
             'value'=>function($model){

                return $model->calculZile($model->cod_contract);
             },],
             ['attribute' => 'Tranzactii',
                'format' => 'raw',
                'value' => function ($model) { 
                    $produs = Produse::find()->where(['_cod' => $model->cod_produs])->one();
                    if($produs->situatie != 'amanetare') {    
                        return 
                            '<div style="margin-top:30px;">'.Html::a('Tranzactii', ['tranzactie/index2','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-success']) .'</div>';
                    } else {                 
                        return '<div>'.Html::a('+', ['tranzactie/create','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-default ad-tranzactie']) .'</div>'.
                            '<div style="margin-top:20px;">'.Html::a('Tranzactii', ['tranzactie/index2','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-success']) .'</div>';
                    }
                },],

             ['attribute' => 'Export',
                'format' => 'raw',
                'value' => function ($model) {                      
                             return '<div style="margin-top:30px;"align="center">'.Html::a('Export', ['amanetare/createpdf3','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-primary','target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Will open the generated PDF file in a new window']) .'</div>';
                        },
                    ],
            

            ['class' => 'yii\grid\ActionColumn',
                  'template'=>'{view}{update}{delete}',
                    'buttons'=>[
                      'view' => function ($url, $model) {
                            $options = [
                                'title' => Yii::t('yii', 'View'),
                                'aria-label' => Yii::t('yii', 'View'),
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                        },
                      'update' => function ($url, $model) {
                            $produs = Produse::find()->where(['_cod' => $model->cod_produs])->one();
                            if($produs->situatie != 'amanetare') {
                                return '';
                            } else {
                                $options = [
                                    'title' => Yii::t('yii', 'Update'),
                                    'aria-label' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                            }
                        },
                        'delete' => function ($url, $model) {
                            $produs = Produse::find()->where(['_cod' => $model->cod_produs])->one();
                            if($produs->situatie != 'amanetare') {
                                return '';
                            } else {
                                $options = [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return '';
                            }
                        }
                  ] 
            ]
=======
            'data_rambursarii',
            'suma_acordata',
             'suma_datorata',
             ['attribute' => 'Tranzactii',
                'format' => 'raw',
                'value' => function ($model) {                      
     return '<div>'.Html::a('+', ['tranzactie/create','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-default ad-tranzactie']) .'</div>'.
       '<div style="margin-top:20px;">'.Html::a('Tranzactii', ['tranzactie/index2','cod_contract'=>$model->cod_contract], ['class'=>'btn btn-success']) .'</div>';
                },],

            // 'comisionul_lunar',
            // 'alte_specificatii:ntext',
            // 'cod_produs',

            ['class' => 'yii\grid\ActionColumn'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
        ],
    ]); ?>

</div>
