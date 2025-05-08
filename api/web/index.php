<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

// 1. Avval autoload.php chaqiriladi
require __DIR__ . '/../../vendor/autoload.php';

// 2. Yii framework faylini qo‘lda chaqirish
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';

// ✅ 3. common bootstrap.php — bu yerda @api alias bor
require __DIR__ . '/../../common/config/bootstrap.php';

// 4. API bootstrap.php (mahalliy sozlamalar)
require __DIR__ . '/../config/bootstrap.php';

// 5. Config fayllar
$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);

// 6. Application ishga tushadi
(new yii\web\Application($config))->run();
