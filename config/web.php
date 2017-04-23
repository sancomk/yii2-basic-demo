<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'layout' => 'column2',
    'layoutPath'=>'@app/themes/adminLTE/layouts',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'OM-olvlcJRVtiE7X3paWVhjGJOL1uQ1K',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
''=>'site/index',
'<action:(index|login|logout)>'=>'site/<action>',
'<controller:\w+>/<id:\d+>' => '<controller>/view',
'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
'<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],
        

'view' => [
'theme' => [
'pathMap' => ['@app/views' => '@app/themes/adminLTE'],
'baseUrl' => '@web/../themes/adminLTE',
],
],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['192.168.10.23', '::1'],
    ];

$config['modules']['gii'] = [
'class' => 'yii\gii\Module',
'generators' => [ //here
'crud' => [ // generator name
'class' => 'yii\gii\generators\crud\Generator', // generator class
'templates' => [ //setting for out templates
'custom' => '@app/vendor/yiisoft/yii2-gii/generators/crud/custom', // template name => path to template
]
]
],
];

}

return $config;
