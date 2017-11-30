<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\utilities\UtilityUrl;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
$session = yii::$app->session;
$session->open();
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Agrilink</title>
        <?php $this->head() ?>
    </head>
    <body id="page-top" class="landing-page no-skin-config">
        <?php $this->beginBody() ?>
        <div class="navbar-wrapper">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container" style="overflow: inherit;">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <div id="navbar" class="navbar-collapse row">
                        <div class="col-md-2"> <a class="navbar-brand" href="/"><img src="<?= Url::base() ?>/img/landing/logo.png"></a></div>
                        <div class="col-md-5">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="input-group m-b">
                                            <div class="input-group-btn">
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle bg-muted" type="button" aria-expanded="false">Giống rau<span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Giống rau</a></li>
                                                    <li><a href="#">Tin tức</a></li>
                                                    <li><a href="#">Dịch vụ</a></li>
                                                </ul>
                                            </div>
                                            <input type="text" placeholder="Giống rau, tin tức, dịch vụ..." class="form-control"></div>
                                    </div>
                                    <div class="col-md-2 pull-right">
                                        <button type="button" class="btn btn-success btn-sm"> Tìm kiếm</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="ibox-content">
                                <div class="row">
                                    <ul class="navbar-top-links navbar-right">
                                        <li>
                                            <span class="m-r-sm text-muted welcome-message">Ngôn ngữ</span>
                                        </li>
                                        <li class="dropdown">
                                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button" aria-expanded="false"><img src="<?= Url::base() ?>/img/flags/16/Vietnam.png"> <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><img src="<?= Url::base() ?>/img/flags/16/Vietnam.png">Tiếng Việt</li>
                                                <li><img src="<?= Url::base() ?>/img/flags/16/United-States.png">Tiếng Anh</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <?php if (Yii::$app->user->isGuest) { ?>
                                                <div class="breadcrumb">
                                                    <a href="<?= Url::to(['site/login']) ?>" class="login">Đăng nhập</a>
                                                    <a href="<?= Url::to(['signup/index']) ?>"class="register">Đăng ký</a>

                                                    <?php } else{ ?>
                                                    <div class="breadcrumb">
                                                        <a  href="javascript:void(0)"><span style="font-weight:bold;"><?= Yii::$app->user->identity->username?></span></a>
                                                        <a href="<?= Url::to(['signup/logout']) ?>"class="register">Đăng xuất</a>
                                                        <a href="<?= Url::to(['contract/profile']) ?>"class="register">Hồ sơ</a>
                                                    </div>
                                                <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="navbar" class="navbar-collapse  bg-navbar">
                    <div class="container">
                        <ul class="nav navbar-nav fadeIn animated">
                            <li><a class="page-scroll" href="#page-top"><img src="<?= Url::base() ?>/img/landing/1.png" /> Vườn Agrilink</a></li>
                            <li><a class="page-scroll" href="<?=Url::to(['/contract'])?>"><img src="<?= Url::base() ?>/img/landing/2.png" /> Mảnh vườn Agrilink</a></li>
                            <li><a class="page-scroll" href="#team"><img src="<?= Url::base() ?>/img/landing/3.png" /> Vườn của khách</a></li>
                            <li><a class="page-scroll" href="#testimonials"><img src="<?= Url::base() ?>/img/landing/4.png" /> Chợ nông sản</a></li>
                            <li><a class="page-scroll" href="#pricing"><img src="<?= Url::base() ?>/img/landing/5.png" /> Tin tức</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </nav>
</div>
<?= $content ?>

<section id="bottom-footer" class="bottom-footer nice-section">
    <div class="container" style="overflow: inherit;">
        <div class="row">
            <div class="col-lg-12 zoomIn">
                <div class="col-lg-2">
                    <img src="<?= Url::base() ?>/img/landing/logo.png">
                </div>
                <div class="col-lg-7">

                    <div class="m-t-sm" style="text-transform: uppercase;color: #fff;">
                        <a href="#" class="text-white">Về Agrilink</a>
                        |
                        <a href="#" class="text-white">Mảnh vườn Agrilink</a>
                        |
                        <a href="#" class="text-white">Chợ Agrilink</a>
                        | 
                        <a href="#" class="text-white">Tin tức</a>
                        | 
                        <a href="#" class="text-white">Thư viện ảnh Agrilink</a>
                        | 
                        <a href="#" class="text-white">Liên hệ</a>
                    </div>
                    <div class="m-t-sm">
                        <p class="text-white" style="color: white!important;"><i class="fa fa-copyright"></i> 2017 Agrilink. All rights </p>
                    </div>
                </div>
                <div class="col-lg-3" style="position: relative;">
                    <div style="position: absolute;bottom: -35px;left: 0;">
                        <a href="#" class="text-white" style="margin-right: 10px;"><img src="<?= Url::base() ?>/img/landing/fb.png"></a>
                        <a href="#" class="text-white" style="margin-right: 10px;"><img src="<?= Url::base() ?>/img/landing/question.png"></a>
                        <a href="#" class="text-white"><img src="<?= Url::base() ?>/img/landing/call.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->endBody() ?>
</body>

</html>
<script>
    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function (event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });



    });



    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

    (function ($) {

        $.fn.yiiActiveForm = function (method) {
            if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else if (typeof method === 'object' || !method) {
                return methods.init.apply(this, arguments);
            } else {
                $.error('Method ' + method + ' does not exist on jQuery.yiiActiveForm');
                return false;
            }
        };

        var methods = {
            init: function (attributes, options) {
            }
        };
    })(window.jQuery);


</script>


<?php $this->endPage() ?>