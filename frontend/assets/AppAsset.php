<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/animate.css',
        'font-awesome/css/font-awesome.min.css',
        'css/style.css',
        'css/jquery-ui.min.css'
        
    ];
    public $js = [
        'js/jquery-1.9.1.min.js',
        'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        'js/inspinia.js',
        'js/plugins/pace/pace.min.js',
        'js/plugins/wow/wow.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
