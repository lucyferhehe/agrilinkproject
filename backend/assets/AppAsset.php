<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap/css/bootstrap.min.css',        
        'font-awesome/css/font-awesome.min.css',
        'css/plugins/morris/morris.css',
        'css/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'css/plugins/datepicker/datepicker3.css',
        'css/plugins/daterangepicker/daterangepicker-bs3.css',
         'css/dist/css/AdminLTE.min.css',      
        'css/dist/css/skins/_all-skins.min.css',   
    ];
    public $js = [
        //'css/plugins/jQuery/jQuery-2.1.3.min.js',       
        'css/bootstrap/js/bootstrap.min.js',
        'css/plugins/fastclick/fastclick.min.js',
        'css/dist/js/app.min.js',        
        'css/plugins/sparkline/jquery.sparkline.min.js',        
        'css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',      
        'css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',  
        'css/plugins/daterangepicker/daterangepicker.js',
        'css/plugins/datepicker/bootstrap-datepicker.js',
        'css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'css/plugins/iCheck/icheck.min.js',
        'css/plugins/slimScroll/jquery.slimscroll.min.js',
         'css/plugins/chartjs/Chart.min.js',  
        'css/dist/js/pages/dashboard2.js',
        'css/dist/js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
