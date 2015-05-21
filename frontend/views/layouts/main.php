<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
           
            if (Yii::$app->user->isGuest) {
                
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                
            } else {

                 $menuItems = [
                ['label' => 'Acasa', 'url' => ['/site/index']],
             
                ['label' => 'Contact', 'url' => ['/site/contact']],
                ['label' => 'Rapoarte', 'url' => ['/raport/index']],
                
                //Contract de vanzare-cumparare
                ['label' => 'Contract','active'=>true, 'items' => [
                ['label' => 'Vanzare-Cumparare','url' => ['/vanzare-cumparare/index']],
                ['label' => 'Amanetare','url'=>['/amanetare/index']],
                ['label' => 'Tranzactii','url' => ['/tranzactie/index']]]],
                //Clienti
                ['label' => 'Clienti', 'active'=>true, 'items' => [
                ['label' => 'Client nou','url' => ['/clienti/create']],
                ['label' => 'Modificare/Stergere client','url'=>['/clienti/index']]]],
                //Produse
                ['label' => 'Produse', 'active'=>true, 'items' => [
                ['label' => 'Produs nou','url' => ['/produse/create']],
                ['label' => 'Modificare/Stergere produse','url'=>['/produse/index']]],
                ],
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'get']
                ]
            ];
                if (Yii::$app->user->id==3) {
                    $menuItems=[];
                $menuItems =[
                ['label' => 'Acasa', 'url' => ['/site/index']],
             
                ['label' => 'Contact', 'url' => ['/site/contact']],
               
                ['label' => 'Administrare ', 'items' => [
                ['label' => 'Angajati','url' => ['/angajati/index']],
                ['label' => 'Users','url'=>['/user/index']]]],
                 [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'get']]];
                
            } 

            }
             
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
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


    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy;<?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
