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
            ],
        ],
    ],
];