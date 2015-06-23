<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;
use frontend\controllers\ProduseController;

?>

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
     return '<div style="margin-top:30px;"align="center">'.Html::a('Vanzare-Cumparare', ['vanzare-cumparare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-success']) .'</div>'.
     '<div style="margin-top:20px;" align="center">'.Html::a('Amanetare', ['amanetare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-warning']) .'</div>';
                },
            ],

           ['class' => 'yii\grid\ActionColumn'],
            
],    
    ]); ?>
<?php Pjax::end() ?>