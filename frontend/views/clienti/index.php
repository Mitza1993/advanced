<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Clienti_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clienti';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clienti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       // 'model' => $model,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nume',
            'prenume',
            'cnp_client',
            //'seria_ci',
            // 'adresa',
             'telefon',

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
                            if($model->areContractA($model->_id)== true || $model->areContractVZ($model->_id)==true) {
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
                            if($model->areContractA($model->_id)== true || $model->areContractVZ($model->_id)==true) {
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
            ['class' => 'yii\grid\ActionColumn'],
 
        ],
    ]); ?>

</div>
