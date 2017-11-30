

<?php

use yii\helpers\Url;

$uid = Yii::$app->user->getId();

use common\models\Products;
use yii\helpers\ArrayHelper;
?>
<script>
</script>
<style class="cp-pen-styles">
    div.fu-product-info {

        overflow: auto;
        white-space: nowrap;
    }

    div.fu-product-info a {
        display: inline-block;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }


</style>
<div id="main">
    <div class="page-in my-profile">
        <div class="block-page">
            <div class="container">
                <div class="box-mProfile"
                     style="height: 20px; border: none; text-align: center; font-weight: bold; font-family: initial; font-size: 20px;">
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="list-group">

                            <a href="#" class="list-group-item list-group-item-action active">
                                Chọn combo </a> <a href="#"
                                               class="list-group-item list-group-item-action addruong4">Gói mầm(4 vườn)</a> 
                            <a href="#"class="list-group-item list-group-item-action addruong6">Góichồi (6 vườn)</a>
                            <a href="#"class="list-group-item list-group-item-action addruong8">Gói lá(8 vườn)</a>
                            <a href="#"class="list-group-item list-group-item-action tuychon">Tùy chọn(+1)</a>
                            <a href="#"class="list-group-item list-group-item-action lammoi">Làm mới</a>


                            <!-- <a href="#" class="list-group-item list-group-item-action add1">thÄ‚Âªm tuĂ¡ÂºÂ§n tĂ¡Â»Â±</a>
<div class="combo addruong4" style="background-image:url('<?= Url::base() ?>/images/mam_cay.jpg')"></div>
<div class="combo addruong6" style="background-image:url('<?= Url::base() ?>/images/choi_cay.jpg')"></div>
<div class="combo addruong8" style="background-image:url('<?= Url::base() ?>/images/la_cay.jpg')"></div> -->
                        </div>
                        <button class="btn btn-success taohopdaong" style="width: 100%">Tạo
                            hợp đồng</button>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-3"></div>
                        <div class="col-md-9 fu_contract" style="min-height:320px;background-image:url('<?= Url::base() ?>/images/nen_co.jpg')">    

                            <?php for ($y = 0; $y < 12; $y++) { ?>
                                <div class="col-md-3" style="padding: 4px;">
                                    <div class="thumbnail ruong" data-id="" href="#"
                                         style="height: 100px; border: none"></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="col-md-4 productlist"
                             style="max-height: 380px; overflow-y: scroll; border-top-color: #00cc33">
                                 <?php
                                 foreach ($products as $pr) {
                                     if ($pr->type == 1) {
                                         ?>

                                    <div>
                                        <a class="thumbnail" style="border-left-color: #00cc33;"
                                           href="javascript:void(0)" data-toggle="tooltip"
                                           data-placement="top" title="<?= $pr->product_name ?>"> <img
                                                class="anhsanpham imgdrap" draggable="true" style="max-height: 100px"
                                                alt="" data-fu="0" data-id="<?= $pr->product_id ?>"
                                                src="<?= Url::base() ?>/images/<?= $pr->hinhanh ?>"></a>
                                    </div>


                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-4 productlist"
                             style="max-height: 380px; overflow-y: scroll; border-top-color: #00cc33">
                                 <?php
                                 foreach ($products as $pr) {
                                     if ($pr->type == 2) {
                                         ?>
                                    <div>
                                        <a class="thumbnail" style="border-left-color: #00cc33;"
                                           href="javascript:void(0)" data-toggle="tooltip"
                                           data-placement="top" title="<?= $pr->product_name ?>"> <img
                                                class="anhsanpham imgdrap" draggable="true" style="max-height: 100px"
                                                alt="" data-fu="0" data-id="<?= $pr->product_id ?>"
                                                src="<?= Url::base() ?>/images/<?= $pr->hinhanh ?>"></a>
                                    </div>   
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px; ">
                    <div class="col-md-5"></div>
                    <div class="col-md-6 all_fu_information" style="overflow-x: auto;margin-bottom: 30px">
                    </div>
                    <div class="box-mProfile"style="border: none; padding: 50px 0 100px 0;">
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="col-md-9">
                                    <input type="text" class="form-control"
                                           placeholder="Tôi muốn chuyển sản phẩm đến..."
                                           aria-label="Search for..." style="height: 50px; width: 100%">
                                </div>
                                <div class="col-md-3">
                                    <img src="<?= Url::base() ?>/images/delivery-truck.png"
                                         style="width: 100%; height: 50px;" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="<?= Url::base() ?>/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?= Url::base() ?>/js/jquery-ui.js" type="text/javascript"></script>

    <script>
    $(document).ready(function () {
//        $(document).on('mousedown', '.anhsanpham', function () {
//            var productid = $(this).attr('data-id');
//            $.ajax({
//                method: "get",
//                url: "/index.php/contract/viewprocedure",
//                data: {
//                    id: productid,
//                },
//                success: function (data) {
//                    $('.procedures').html(data);
//                }
//            });
//        });
    });
    $('.lammoi').click(function () {

        $('.fu_contract div div').slice(0, 12).empty();
        $('.fu_contract div div').slice(0, 12).removeClass("duocadd");
        $('.fu_contract div div').css({'background-image': ''});
    });
    $('.addruong4').click(function () {

        $('.fu_contract div div').css({'background-image': ''});
        $('.fu_contract div div').slice(4, 12).empty();
        $('.fu_contract div div').slice(0, 4).addClass("duocadd");
        $('.fu_contract div div').slice(4, 12).removeClass("duocadd");
        $('.fu_contract div div').slice(0, 4).css({
            'background-image': 'url(<?= Url::base() ?>/images/acker.jpg'
        });
    });
    $('.addruong6').click(function () {

        $('.fu_contract div div').slice(6, 12).empty();
        $('.fu_contract div div').slice(0, 6).addClass("duocadd");
        $('.fu_contract div div').slice(6, 12).removeClass("duocadd");
        $('.fu_contract div div').css({'background-image': ''});
        $('.fu_contract div div').slice(0, 6).css({
            'background-image': 'url(<?= Url::base() ?>/images/acker.jpg'
        });
    });
    $('.addruong8').click(function () {

        $('.fu_contract div div').slice(8, 12).empty();
        $('.fu_contract div div').slice(0, 8).addClass("duocadd");
        $('.fu_contract div div').slice(8, 12).removeClass("duocadd");
        $('.fu_contract div div').css({'background-image': ''});
        $('.fu_contract div div').slice(0, 8).css({
            'background-image': 'url(<?= Url::base() ?>/images/acker.jpg'
        });
    });
    $('.tuychon').click(function () {

        $('.fu_contract div div').not('.duocadd').first().css({
            'background-image': 'url(<?= Url::base() ?>/images/acker.jpg'
        });
        $('.fu_contract div div').not('.duocadd').first().addClass("duocadd");

    });

    $('.imgdrap').draggable({
        containment: 'document',
        opacity: 0.8,
        revert: 'invalid',
        helper: function () {
            return $(this).clone().appendTo('body').show();
        },
        zIndex: 99,
    });
    $('.ruong').droppable({
        live: true,
        containment: 'document',
        accept: '.imgdrap',
        drop: function (ev, ui) {
            var dropitem = $(ui.draggable).clone().css({
                width: '100%', height: '100%',
            });
            if ($(this).hasClass('duocadd')) {
                if (!$(this).hasClass('added')) {
                    $(this).append(dropitem);
                    $(this).addClass("added");
                } else {
                    $(this).children().remove();
                    $(this).append(dropitem);
                }
            }
        }
    });
    $('.ruong').dblclick(function () {
        if ($(this).find('img').hasClass('progressing')) {
            $fuid = $(this).find('img').data('fu');
            $('.fu-product-info').find('a').each(function () {
                if ($(this).find('img').data('fu') == $fuid) {
                    $(this).show();
                }
            });
        }
        $(this).children().remove();
        $(this).removeClass('added');

    });
    $('.taohopdaong').click(function () {
        var x = 0;
        var ruong = [];
        if ($('.fu_contract').children().length <= 0) {
            alert("khong co ruong");
            return false;
        }
        $('.fu_contract div .thumbnail').each(function () {
            if ($(this).hasClass('duocadd') && $(this).children().length > 0)
            {
                x = 1;
            }
        });
        if (x == 0) {
            alert("ban chua chon cay trong");
            return false;
        }
        $('.fu_contract div .thumbnail').each(function () {
            if ($(this).hasClass("added")) {
                ruong.push({'ruong': $(this).find('img').attr('data-fu'), 'sanpham': $(this).find('img').attr('data-id'),
                });
            }
        });

        var dichvu = [];
        $('.checkboxService').each(function () {
            if ($(this).is(':checked')) {
                dichvu.push({'dichvu': $(this).attr('data-id')});
            }
        });
            console.log(ruong);
        $.ajax({
            type: "post",
            async: false,
            url: "/contract/taohopdong",
            data: {
                ruong: ruong,
                //dichvu: dichvu
            },
            success: function (data) {
                console.log(data.code);
                console.log(data.massage);
                if (data.code == 200) {

                    window.location.href = "/contract/chitiethopdong?hopdong=" + data.id;
                } else {
                    alert("insert khong thanh cong");
                }
            }
        });

    });
    $('.productlist div a img').mousedown(function () {
        var id = $(this).data('id');


        $.ajax({
            type: "post",
            async: false,
            url: "/contract/allfuinfor",
            data: {
                id: id
            },
            success: function (data) {
                $('.all_fu_information').html(data)
            }
        });
    });



    </script>