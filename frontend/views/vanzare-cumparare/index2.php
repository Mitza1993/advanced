<?php

use yii\helpers\Html;
use frontend\controllers\ClientiController;
use kartik\grid\GridView;
use frontend\models\VanzareCumparare;
use frontend\controllers\AngajatiController;
use frontend\models\Produse;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Vanzare_Cumparare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="vanzare-cumparare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php 

    echo Html::a('Export as PDF', ['/vanzare-cumparare/createpdf2'], [
        'class'=>'btn btn-primary', 
        'target'=>'_blank', 
        'data-toggle'=>'tooltip', 
        'title'=>'Will open the generated PDF file in a new window'
    ]);
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
        'rowOptions' => function($model)
        {
            if($model->tip_tranzactie == 'Vanzare')
            {
                return ['class' =>'success'];
            }
            
        },
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
        'cod_contract',
            [
                'attribute'=>'id_client',
                'value'=>'idClient.nume',
                'footer'=>'Total',
            ],
            [
                'attribute'=>'Prenume',
                'value'=>'idClient.prenume',
            ],
            [
            'attribute'=>'cod_angajat',
                'value'=>function($model){
                    $angajat = AngajatiController::findModel($model->cod_angajat);
                    return $angajat->nume.' '.$angajat->prenume;

                },
            ],
            [
                'attribute'=>'cod_produs',
                'value'=> 'codProdus.denumire',
            ],

             'data_inchieierii',             
             [
    'attribute' => 'suma_contractata',
   // 'format' => "raw",
    'footer'=>VanzareCumparare::getTotal($dataProvider->models,'suma_contractata'),
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
                            $today = new DateTime('now');
                            if($model->data_inchieierii <  $today) {
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
                             $today = new DateTime('now');
                            if($model->data_inchieierii < $today) {
                                return '';
                            } else {
                                $options = [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                            }
                        }
                  ] 
            ]
        ],
    ]); ?>

</div>
