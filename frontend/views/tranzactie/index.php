<?php

use yii\helpers\Html;
use yii\grid\GridView;
<<<<<<< HEAD
use \DateTime;
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Tranzactie_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tranzactii efectuate';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzactie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
<<<<<<< HEAD
        //'filterModel' => $searchModel,

        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'cod_contract_amanetare',
                'value'=>'codContractAmanetare.idClient.nume',
                'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
=======
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'cod_contract_amanetare',
                'value'=>'codContractAmanetare.idClient.nume',
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            ],
            [
                'attribute'=>'_id',
                'value'=>'codContractAmanetare.idClient.prenume',
<<<<<<< HEAD
                'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
            ],
            ['attribute' => 'suma',
            'value'=> function($model){return $model->suma;},
            'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
                ],
                ['attribute' => 'data',
            'value'=> function($model){return $model->data;},
            'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
                ],
                ['attribute' => 'tip_tranzactie',
            'value'=> function($model){return $model->tip_tranzactie;},
            'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
                ],
            
            

            ['attribute' => 'Export',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
                'value' => function ($model) {                      
                             return '<div style="align:center;">'.Html::a('Export', ['tranzactie/createpdf4','_id'=>$model->_id], ['class'=>'btn btn-primary','target'=>'_blank', 
                                'data-toggle'=>'tooltip', 
                                'title'=>'Will open the generated PDF file in a new window']) .'</div>';
                        },
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                                    'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],

                  'template'=>'{view}{update}{delete}',
                    'buttons'=>[
                      'view' => function ($url, $model) {
                            $options = [
                                'title' => Yii::t('yii', 'Vizualizeaza'),
                                'aria-label' => Yii::t('yii', 'Vizualizeaza'),
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                        },
                      'update' => function ($url, $model) {
                            $today = new DateTime('now');
                            if($model->data < $today) {
                                return '';
                            } else {
                                $options = [
                                    'title' => Yii::t('yii', 'Modifica'),
                                    'aria-label' => Yii::t('yii', 'Modifica'),
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                            }
                        },
                        'delete' => function ($url, $model) {
                           $today = new DateTime('now');
                            if($model->data < $today) {
                                return '';
                            } else {
                                $options = [
                                    'title' => Yii::t('yii', 'Sterge'),
                                    'aria-label' => Yii::t('yii', 'Stergere'),
                                    'data-confirm' => Yii::t('yii', 'Sunteti sigur ca vrei sa-l stergeti?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                            }
                        }
                  ] 
            ],
        
            

           // ['class' => 'yii\grid\SerialColumn'],
=======
            ],
            'suma',
            'data',
            'tip_tranzactie',
            

            ['class' => 'yii\grid\ActionColumn'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
        ],
    ]); ?>

</div>
