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
             return '<div style="margin-top:30px;"align="center">'.Html::a('Vanzare-Cumparare', ['vanzare-cumparare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-success']) .'</div>'.
             '<div style="margin-top:20px;" align="center">'.Html::a('Amanetare', ['amanetare/create','cod_produs'=>$model->_cod], ['class'=>'btn btn-warning']) .'</div>';
                        },
                    ],

                   ['class' => 'yii\grid\ActionColumn'],
                    
        ],    
            ]); ?>
        <?php Pjax::end() ?>
    </div>
</div>
