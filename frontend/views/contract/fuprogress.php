
<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\utilities\UtilityUrl;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\ContractFu;
use common\models\ProductFu;
?>
<style>

    #custom_carousel .item {

        color:#000;
        background-color:#eee;
        padding:20px 0;
    }
    #custom_carousel .controls{
        overflow-x: auto;
        overflow-y: hidden;
        padding:0;
        margin:0;
        white-space: nowrap;
        text-align: center;
        position: relative;
        background:#ddd
    }
    #custom_carousel .controls li {
        display: table-cell;
        width: 1%;
        max-width:90px
    }
    #custom_carousel .controls li.active {
        background-color:#eee;
        border-top:3px solid orange;
    }
    #custom_carousel .controls a small {
        overflow:hidden;
        display:block;
        font-size:10px;
        margin-top:5px;
        font-weight:bold
    }
    #custom_carousel .izq 
    {
        position:absolute;
        left: -25px;
        top:40%;
        background-image: none;
        background: none repeat scroll 0 0 #222222;
        border: 4px solid #FFFFFF;
        border-radius: 23px;
        height: 40px;
        width : 40px;
        margin-top: 30px;
    }
    #custom_carousel .der 
    {
        position:absolute;
        right: -25px !important;
        top:40%;
        left:inherit;
        background-image: none;
        background: none repeat scroll 0 0 #222222;
        border: 4px solid #FFFFFF;
        border-radius: 23px;
        height: 40px;
        width : 40px;
        margin-top: 30px;
    }
</style>
<div class="col-md-12" style="padding: 50px 0 200px 0;">
    <div class="container-fluid">
        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="22200">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <?php foreach ($fuprogress as $fup) { ?>
                    <div class="item ">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"><img src="<?= Url::base() ?>/images/<?= $fup->img ?>" class="img-responsive"></div>
                                <div class="col-md-9">
                                    <p><span style="font-weight: bold;">Ngày</span> :<?= date('d/m/Y', $fup->date) ?></p>
                                    <h2 style="font-weight: bold; text-transform: capitalize;"><?= $fup->Process_name ?></h2>
                                    <p><?= $fup->description ?></p>
                                </div>
                            </div>
                        </div>            
                    </div> 
                <?php } ?>            
                <!-- End Item -->
            </div>
            <!-- End Carousel Inner -->
            <a data-slide="prev" href="#custom_carousel" class="izq carousel-control" style="background-color: #80ac3d">‹</a>
            <a data-slide="next" href="#custom_carousel" class="der carousel-control" style="background-color: #80ac3d">›</a>
            <div class="controls">
                <ul class="nav">    

                    <?php $i = 0;
                    foreach ($fuprogress as $fup) {
                        ?>
                        <li data-target="#custom_carousel" data-slide-to="<?= $i ?>"><a href="#"><img src="<?= Url::base() ?>/images/<?= $fup->img ?>" class="img-responsive"style="width: 100%; height: 100%">"><small><?= date('d/m/Y', $fup->date) ?></small></a></li>
                        <?php $i++;
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- End Carousel -->
    </div>

</div>
  <script src="<?= Url::base() ?>/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function (ev) {
        $('#custom_carousel').on('slide.bs.carousel', function (evt) {
            $('#custom_carousel .controls li.active').removeClass('active');
            $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
        });
        $('body').find('.controls ul li').last().addClass('active');
        $('#custom_carousel .carousel-inner .item').last().addClass('active');
        
       
    });
</script>