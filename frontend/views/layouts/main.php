<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use kartik\nav\NavX;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?> 

    <title><?= Html::encode($this->title= "[aim] AMANET") ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
    <?= Html::csrfMetaTags() ?> 
        <?php
            NavBar::begin([
                'brandLabel' => '[aim] AMANET',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top my-nav',
                ],
            ]);
           
           
            if (Yii::$app->user->isGuest) {
                
                $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> Login', 'url' => ['/site/login']];
                
            } else {

                 $menuItems = [
                    ['label' =>  '<span class="glyphicon glyphicon-home nav-item"></span> Acasa', 'url' => ['/site/index']],
                 
                    
                     //Produse
                    ['label' => ' <span class="glyphicon glyphicon-phone nav-item"></span> Produse', 'items' => [
                    ['label' => 'Adaugare produs','url' => ['/produse/create']],
                    ['label' => 'Produse','url'=>['/produse/index']]
                    ],],
                    //Clienti
                    ['label' => '<span class="glyphicon glyphicon-user nav-item"></span> Clienti', 'items' => [
                    ['label' => 'Adaugare client','url' => '/clienti/create'],
                    ['label' => 'Lista clienti','url'=>'/clienti']]],
                    //Contract de vanzare-cumparare
                    ['label' => '<span class="glyphicon glyphicon-list-alt nav-item"></span> Contract', 'items' => [
                        ['label' => 'Amanetare','url'=>['/amanetare/index']],
                        ['label' => 'Vanzare','url'=>['/vanzare-cumparare/index2']],
                        ['label' => 'Cumparare','url'=>['/vanzare-cumparare/index']]
                    ]],
                    //Rapoarte
                    ['label' => ' <span class="glyphicon glyphicon-stats nav-item"></span> Rapoarte', 'items'=> [
                     ['label' => 'Rapoarte totale', 'url' => ['/raport/raport-amanet']],
                     ['label' => 'Raport clienti', 'url' => ['/raport/raport-clienti']],
                        ],
                    ],                    
                    
                    
                   
                    
                    [
                        'label' => '<span class="glyphicon glyphicon-off nav-item"></span> Logout(' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'get']
                    ]
                ];
                if (Yii::$app->user->id==3) {
                    $menuItems=[];
                $menuItems =[
                ['label' => 'Acasa', 'url' => ['/site/index']],
             
<<<<<<< HEAD
                ['label' => 'Adauga user', 'url' => ['/site/signup']],
                ['label' => 'Administrare ', 'items' => [
                ['label' => 'Angajati','url' => ['/angajati/index']],
                ['label' => 'Istoric stergeri','url' => ['/log-stergere/index']],
=======
                ['label' => 'Ghid', 'url' => ['/site/contact']],
               
                ['label' => 'Administrare ', 'items' => [
                ['label' => 'Angajati','url' => ['/angajati/index']],
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
                ['label' => 'Users','url'=>['/user/index']]]],
                 [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'get']]];
                
            } 

            }
             
            echo NavX::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'activateParents' => true,
                'encodeLabels' => false
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>


    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
