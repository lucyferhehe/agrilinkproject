

<?php

use yii\helpers\Url;

$uid = Yii::$app->user->getId();

use common\models\Products;
use yii\helpers\ArrayHelper;
?>
<script type="text/javascript">
    function drag(ev) {
        console.log("aa");
        ev.dataTransfer.setData("text", ev.target.id);
    }
    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>
<input type="hidden" value="<?= $uid ?>" name="userid">
<div id="main">
    <div class="page-in my-profile">
        <div class="block-page">
            <div class="container" >
                <div class="box-mProfile" >
                </div>
                <p style="height:20px;background-image:url(<?= Url::base() ?>/images/zaun.png)"></p> 
                <div class="container">
                    <div  class="col-md-2" style="max-height: 800px; overflow-y: scroll" >
                        <div id="navigation " >
                            <ul class="top-level">
                                <li style="border: none; font-weight:bold"> Hãy chọn ruộng:</li>
                                <?php foreach ($fu as $f) { ?>                            
                                    <li draggable="true"  class="addok"><a href="#" data-id="<?= $f->fuid ?>">ruong: <?= $f->fuid ?></a><button style="float: right; height: 23px; border-radius:5px; background-color:#9bcb5b">add</button></li>
                                <?php } ?>                               

                            </ul>
                        </div>
                    </div>
                    <p style="text-align: center;font-weight: bold"> Chọn sản phẩm:</p>
                    <div class="container">
                        <div class="col-md-10">  
                            <div class='row'>
                                <div class='col-md-10'>
                                    <div class="carousel slide media-carousel" id="media">
                                        <div class="carousel-inner">
                                            <?php
                                            $results = ArrayHelper::toArray($pro, [
                                                        'common\models\Products' => [
                                                            'product_id',
                                                            'product_name',
                                                            'fuid',
                                                            'harvest_time',
                                                            'price',
                                                            'description',
                                                            'hinhanh'
                                                        ]
                                            ]);
                                            $chan = (int) (count($results) / 6);
                                            $du = (count($results)) - ($chan * 6);
                                            if ($chan == 1) {
                                                ?>
                                                <div class="item active">
                                                    <div class="row" >
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[0]["product_id"] ?>" src="<?= Url::base() ?>/images/<?= $results[0]["hinhanh"] ?>"></a>
                                                        </div>   
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt=""data-id="<?= $results[1]["product_id"] ?>" src="<?= Url::base() ?>/images/<?= $results[1]["hinhanh"] ?>"></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[2]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[2]["hinhanh"] ?>"></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt=""data-id="<?= $results[3]["product_id"] ?>" src="<?= Url::base() ?>/images/<?= $results[3]["hinhanh"] ?>"></a>
                                                        </div>  
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt=""data-id="<?= $results[4]["product_id"] ?>" src="<?= Url::base() ?>/images/<?= $results[4]["hinhanh"] ?>"></a>
                                                        </div>  
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt=""data-id="<?= $results[5]["product_id"] ?>" src="<?= Url::base() ?>/images/<?= $results[5]["hinhanh"] ?>"></a>
                                                        </div>  
                                                    </div>
                                                </div>  
                                                <div class="item">
                                                    <?php
                                                    if ($du > 0) {
                                                        for ($j = ($chan * 6); $j < ($chan * 6) + $du; $j++) {
                                                            ?>
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt=""data-id="<?= $results[j]["product_id"] ?>" src="<?= Url::base() ?>/images/<?= $results[$j]["hinhanh"] ?>"></a>
                                                            </div> 
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            } else
                                            if ($chan > 1) {
                                                ?>
                                                <div class="item  active">
                                                    <div class="row" >
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" data-id="<?= $results[0]["product_id"] ?>" alt="" src="<?= Url::base() ?>/images/<?= $results[0]["hinhanh"] ?>"></a>
                                                        </div>   
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" data-id="<?= $results[1]["product_id"] ?>"alt="" src="<?= Url::base() ?>/images/<?= $results[1]["hinhanh"] ?>"></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" data-id="<?= $results[2]["product_id"] ?>"alt="" src="<?= Url::base() ?>/images/<?= $results[2]["hinhanh"] ?>"></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true"data-id="<?= $results[3]["product_id"] ?>" alt="" src="<?= Url::base() ?>/images/<?= $results[3]["hinhanh"] ?>"></a>
                                                        </div>  
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" data-id="<?= $results[4]["product_id"] ?>"alt="" src="<?= Url::base() ?>/images/<?= $results[4]["hinhanh"] ?>"></a>
                                                        </div>  
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" data-id="<?= $results[5]["product_id"] ?>"alt="" src="<?= Url::base() ?>/images/<?= $results[5]["hinhanh"] ?>"></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <?php
                                                for ($i = 1; $i <= $chan - 1; $i++) {
                                                    ?>
                                                    <div class="item">
                                                        <div class="row" >
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$i * 6]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$i * 6]["hinhanh"] ?>"></a>
                                                            </div>   
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$i * 6 + 1]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$i * 6 + 1]["hinhanh"] ?>"></a>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$i * 6 + 2]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$i * 6 + 2]["hinhanh"] ?>"></a>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$i * 6 + 3]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$i * 6 + 3]["hinhanh"] ?>"></a>
                                                            </div>  
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$i * 6 + 4]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$i * 6 + 4]["hinhanh"] ?>"></a>
                                                            </div>  
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$i * 6 + 5]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$i * 6 + 5]["hinhanh"] ?>"></a>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                if ($du > 0) {
                                                    ?>
                                                    <div class="item">
                                                        <?php
                                                        for ($j = ($chan * 6); $j < ($chan * 6) + $du; $j++) {
                                                            ?>
                                                            <div class="col-md-2">
                                                                <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$j]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$j]["hinhanh"] ?>"></a>
                                                            </div> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="item active">
                                                    <?php
                                                    for ($j = ($chan * 6); $j < ($chan * 6) + $du; $j++) {
                                                        ?> 
                                                        <div class="col-md-2">
                                                            <a class="thumbnail" href="#"><img  draggable="true" alt="" data-id="<?= $results[$j]["product_id"] ?>"src="<?= Url::base() ?>/images/<?= $results[$j]["hinhanh"] ?>"></a>
                                                        </div> 

                                                    <?php }
                                                    ?>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                        <a data-slide="next" href="#media" class="right carousel-control">›</a>
                                    </div>                          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 fu_contract"  style="min-height: 200px;">
<!--                           <div class="col-md-2"><div class="thumbnail" href="#" style="height: 100px;background-image:url(<?= Url::base() ?>/images/acker.jpg)" >
                                 
                                    <img src="<?= Url::base() ?>/images/toi.jpg" style="width:100%; height: 100%;z-index: -1; "alt=""/>
                                    <img src="<?= Url::base() ?>/images/tn.jpg" style="width:20%; height: 20%;float: right; margin-top: -25px; z-index: 289;position: absolute;border: #000 1px"alt=""/>
                                </div> 
                            </div>-->
                        </div>
                        <div class="col-md-2 procedures"  style="min-height: 500px;" >


                        </div>
                        <div class="col-md-10 "  style="min-height: 500px;">
                            <div class="table-transactions " >
                                <table class="table table-bordered table-striped" >
                                    Chọn dịch vụ:  
                                   
                                    <tbody>
                                        <tr>
                                        <?php foreach ($ser as $se) { ?>
                                                <td><img src="<?= Url::base()?>/images/<?= $se->image ?>"></td>
                                        <?php } ?>
                                        </tr>
                                        <tr>
                                        <?php foreach ($ser as $se) { ?>
                                               <td><?= $se->price ?> đồng</td>
                                        <?php } ?>
                                        </tr>
                                        <tr>
                                        <?php foreach ($ser as $se) { ?>
                                               <td><input type="checkbox" class="checkboxService" data-id="<?= $se->service_id ?>" value="<?= $se->service_id ?>"></td>
                                        <?php } ?>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                                <div class="filter-transactions">
                                    <button class="btn btn-success taohopdaong">Tạo Hợp ĐỒng</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <input type="hidden" value="<?= $uid ?>" name="userid">
                <p style="height:20px;background-image:url(<?= Url::base() ?>/images/zaun.png)"></p> 

                <p style="height:20px;background-image:url(<?= Url::base() ?>/images/zaun.png)"></p> 
            </div>
        </div>
    </div>
</div>

<script src="<?= Url::base() ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        var a;
        $('.carousel-inner div div div a img').mousedown(function (e) {
            a = $(e.target).clone();
            a.css({
                width: '100%', height: '100%'
            })
        });
        $('.fu_contract div .thumbnail').click(function () {
            console.log("aaaa");
            if (!$(this).hasClass('added') && a != null) {
                $(this).append(a);
                a = null;
                $(this).addClass('added');
            }
        });
        $('.top-level li').click(function () {
            var dataId = $(this).find('a').attr('data-id');
            if ($(this).hasClass('addok')) {
                $('.fu_contract').append(' <div class="col-md-2" ><i class="fa fa-times-circle" aria-hidden="true" style="float:right;margin-top:-15px; display:none"></i> <div class="thumbnail" href="#" data-id=' + dataId + ' style="height: 100px;background-image:url(<?= Url::base() ?>/images/acker.jpg)" ></div></div>');
                $(this).css('background-color', 'yellow');
                $(this).find('button').remove();
                $(this).removeClass('addok');
                $('.carousel-inner div div div a img').mousedown(function (e) {
                    a = $(e.target).clone();
                    a.css({
                        width: '100%', height: '100%',

                    })
                });
                $('.fu_contract div .thumbnail').click(function () {
                    if (!$(this).hasClass('added') && a != null) {
                        $(this).append(a);
                        a = null;
                        $(this).addClass('added');
                    }
                    
                     $('.fu_contract div .thumbnail img').click(function (e) {
                    console.log("a");
                    var id = $(this).data('id');
                    $.ajax({
                        method: "post",
                        url: "/contract/viewprocedure",
                        data: {
                            id: id,
                        },
                        success: function (data) {
                            $('.procedures').html(data);
                        }
                    });

                });
                });    
            }
            $('.fu_contract div .thumbnail').mouseover(function () {
                $(this).parent().find('i').toggle();
            });
            $('.fu_contract div').mouseleave(function () {
                $(this).find('i').toggle();
            });
            $('.fu_contract div i').click(function () {
                $(this).parent().remove();
            });
            
        });
         $('.taohopdaong').click(function () {
            var x = 0;
            var ruong = [];
            if ($('.fu_contract').children().length <= 0) {
                alert("khong co ruong");
                return false;
            }
            $('.fu_contract div .thumbnail').each(function () {
                if ($(this).children().length <= 0) {
                    x = 1;
                }
            });
            if (x == 1) {
                alert("Ruong cua ban chua chon giong cay");
                return false;
            }
            $('.fu_contract div .thumbnail').each(function () {             
                ruong.push({'ruong': $(this).attr('data-id'), 'sanpham': $(this).find('img').attr('data-id'),
                'quytrinh':$(this).find('img').last().attr('data-id'),
               
        });
         console.log(ruong);;
            });
            var dichvu = [];
            $('.checkboxService').each(function () {
                if ($(this).is(':checked')) {
                    dichvu.push({'dichvu': $(this).attr('data-id')});
                }
            });
          
            console.log(dichvu);
            $.ajax({
                method: "post",
                url: "/contract/taohopdong",
                data: {
                    ruong: ruong,
                    dichvu: dichvu
                },
                success: function (data) {
                     console.log(data.code);
                    console.log(data.massage);
                    if (data.code == 100) {
                        console.log('')

                     window.location.href = "/contract/profile";
                    }
                }
            });

        });
       
        $('.fu_contract div .thumbnail').bind('click', function (e) {
            console.log("a");
            var id = $(this).data('id');
            $.ajax({
                method: "post",
                url: "/contract/viewprocedure",
                data: {
                    id: id,
                },
                success: function (data) {
                    $('.procedures').html(data);
                }
            });
           

        });
         






    });
</script>
