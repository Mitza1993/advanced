<?php

use yii\helpers\Html;
use frontend\controllers\ClientiController;
use kartik\grid\GridView;
use frontend\models\VanzareCumparare;
use frontend\controllers\AngajatiController;
<<<<<<< HEAD
use frontend\models\Produse;

=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Vanzare_Cumparare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="vanzare-cumparare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
<<<<<<< HEAD
<?php 

    echo Html::a('Export as PDF', ['/vanzare-cumparare/createpdf'], [
        'class'=>'btn btn-primary', 
        'target'=>'_blank', 
        'data-toggle'=>'tooltip', 
        'title'=>'Will open the generated PDF file in a new window'
    ]);
    ?>
=======

>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0


   





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
        'rowOptions' => function($model)
        {
            if($model->tip_tranzactie == 'Cumparare')
            {
                return ['class' =>'danger'];
            }
            
        },
        'columns' => [
<<<<<<< HEAD
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
=======
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id_client',
                'value'=>function($model){
                    $client = ClientiController::findModel($model->id_client);
                    return $client->nume.' '.$client->prenume;
                },
                'footer'=>'Total',
            ],
            [
                'attribute'=>'cod_produs',
                'value'=> 'codProdus.denumire',
            ],

>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            [
            'attribute'=>'cod_angajat',
                'value'=>function($model){
                    $angajat = AngajatiController::findModel($model->cod_angajat);
                    return $angajat->nume.' '.$angajat->prenume;

                },
            ],
<<<<<<< HEAD
            [
                'attribute'=>'cod_produs',
                'value'=> 'codProdus.denumire',
            ],


            
             //'tip_tranzactie',
            'data_inchieierii',
            // 'alte_specificatii:ntext',
             //'suma_contractata',
             [
    'attribute' => 'suma_contractata',
    'format' => "raw",
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
=======
             //'tip_tranzactie',
            'data_inchieierii',
            // 'alte_specificatii:ntext',
            // 'suma_contractata',
             [
    'attribute' => 'suma_contractata',
   // 'format' => "raw",
    'footer'=>VanzareCumparare::getTotal($dataProvider->models,'suma_contractata'),
],
        
            ['class' => 'yii\grid\ActionColumn'],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
        ],
    ]); ?>


   

</div>
