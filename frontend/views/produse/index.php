<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;
use frontend\controllers\ProduseController;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Produse_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produse';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produse-index">





 
    <h1>Afisare produse gestionate</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


      <?php Pjax::begin(['id' => 'form-grid']) ?>
    <form method="post" id="index-produse" >
          
           <div class="radio">
                <label><input type="radio" name="option" value="in stoc" checked="checked">In stoc </label>
          </div>
            <div class="radio">
                <label><input type="radio" name="option" value="vandut">Vandute</label>
          </div>
          <div class="radio disabled">
                <label><input type="radio" name="option" value="amanetare">Amanetate</label>
          </div>
    </form>
    <?php Pjax::end() ?>
    <div class="partial_index_container">
        

            <?php Pjax::begin(['id' => 'update-grid']) ?>
            <?=GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                   // '_cod',
                    'denumire',
                    'tip',
                   // 'unitate',
                   // 'cantitate',
                    // 'caracteristici:ntext',
                    // 'stare',
                    [
                    'attribute' => 'file',
                    'format'=> 'html',
                    'value' => function ($data) {
                        return Html::img($data['foto'],
 
                            ['width' => '160px',
                               'height'=> '160px', ]);
                    },
                    ],
                      [
                        'attribute' => 'Actiuni',
                        'format' => 'raw',
                        'value' => function ($model) { 
                        if($model->areContractA($model->_cod)== true || $model->areContractVZ($model->_cod)==true)  
                        {
                                 return '<div style="margin-top:30px;"align="center">'.Html::a('Vanzare-Cumparare', ['vanzare-cumparare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-success ']) .'</div>';
                        }   
                        else{

                        }                
             return '<div style="margin-top:30px;"align="center">'.Html::a('Vanzare-Cumparare', ['vanzare-cumparare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-success ']) .'</div>'.
             '<div style="margin-top:20px;" align="center">'.Html::a('Amanetare', ['amanetare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-warning amanetare']) .'</div>';
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
                            //var_dump($model->areContract($model->_id)); die();
                            if($model->areContractA($model->_cod)== true || $model->areContractVZ($model->_cod)==true) {
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
                            if($model->areContractA($model->_cod)== true || $model->areContractVZ($model->_cod)==true) {
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
            ],

                   //['class' => 'yii\grid\ActionColumn'],      

                   ['class' => 'yii\grid\ActionColumn'],
 
                    
        ],    
            ]); ?>
        <?php Pjax::end() ?>
    </div>
</div>
