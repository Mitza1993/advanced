<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Angajati_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Angajati';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angajati-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adauga angajati', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

<<<<<<< HEAD
            'cod_angajat',
=======
          //  'cod_angajat',
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            'nume',
            'prenume',
           // 'adresa',
            'cnp',
            // 'seria',
            // 'telefon',
            // 'data_angajarii',
            // 'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
