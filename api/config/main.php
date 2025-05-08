<?php

// Umumiy konfiguratsiyalarni yuklash
$common = require __DIR__ . '/../../common/config/main.php';
$commonLocal = require __DIR__ . '/../../common/config/main-local.php';

return yii\helpers\ArrayHelper::merge(
    $common,
    $commonLocal,
    [
        'id' => 'app-api',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log'],
        'controllerNamespace' => 'api\modules\v1\controllers',
        'components' => [
            'request' => [
                'cookieValidationKey' => getenv('APP_SECRET') ?: 'your_random_secret_key',
                'parsers' => [
                    'application/json' => 'yii\web\JsonParser',
                ]
            ],
            'user' => [
                'identityClass' => 'common\models\User',
                'enableSession' => false,
                'loginUrl' => null,
            ],
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'enableStrictParsing' => false,
                'rules' => [
                    'POST v1/social/login' => 'v1/social-account/login',
                    'PUT v1/user/profile/update' => 'v1/user/update-profile',
                    'GET v1/admin/stats' => 'v1/admin-stats/stats',
                ],
            ],
        ],
        'modules' => [
            'v1' => [
                'class' => 'api\modules\v1\Module',
            ],
        ],
        'params' => yii\helpers\ArrayHelper::merge(
            require __DIR__ . '/params.php',
            require __DIR__ . '/params-local.php'
        ),

    ]
);
