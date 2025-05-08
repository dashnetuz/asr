<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/app';
    public $baseUrl = '@web/app';

    public $css = [
        'css/bootstrap.min.css',
        'css/plugin.css',
        'css/default.css',
        'css/styles.css',
        'icons/font-awesome.min.css',
    ];

    public $js = [
        'js/jquery-3.7.1.min.js',
        'js/bootstrap.bundle.min.js',
        'js/custom-nav.js',
        'js/plugin.js',
        'js/main.js',
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
