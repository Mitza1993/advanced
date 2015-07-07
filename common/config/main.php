<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
<<<<<<< HEAD
            'rules'=> [

            'Acasa' =>'site/index',

            //Contracte
            'amanetare'=>'amanetare/index',
            'vanzare'=>'vanzare-cumparare/index2',
            'cumparare'=>'vanzare-cumparare/index2',
            'Contract vanzare-cumparare' => 'vanzare-cumparare/create',
            'Contract amanetare' => 'amanetare/create',

            //Clienti
            'Lista clienti'=>'clienti/index',
            'Adaugare client'=>'clienti/create',
            'Vizualizare client' => 'clienti/view',
            'Modificare client'=>'clienti/update',

            //Produse
            'Lista produse'=>'produse/index',
            'Vizualizare produs' => 'produse/view',
            'Modificare produs'=>'produse/update',

            //Rapoarte
            'Raport  total' =>'raport/raport-amanet',
            'Raport  clienti' =>'raport/raport-clienti',

            'Istoric stergeri'=>'logstergere/index',
=======
            'rules'=> ['amanetare'=>'amanetare/index',
            'clienti'=>'clienti/index',
            'Adaugare client'=>'clienti/create',
            'produse'=>'produse/index',
            'Produse vandute'=>'produse/index2',
            'Produse amanetate'=>'produse/index3',
            'Vizualizare produs' => 'produse/view',
            'Modificare produs'=>'produse/update',
            'Contract vanzare-cumparare' => 'vanzare-cumparare/create',
            'Raport  total' =>'raport/raport-amanet',
            'Raport  clienti' =>'raport/raport-clienti',
            'Acasa' =>'site/index',
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
            ],
        ],
    ],
];