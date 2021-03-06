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

           
            ],
        ],
    ],
    ];
