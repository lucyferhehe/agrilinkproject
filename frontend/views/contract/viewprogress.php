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
use common\models\FuProgress;
use yii\helpers\ArrayHelper;
?>
<style>

    #custom_carousel .item {
        padding:10px 0;
         background-color:#eee;
    }
    #custom_carousel .controls{
        overflow-x: auto;
        overflow-y: hidden;
        padding:0;
        margin:0;
        white-space: nowrap;
        text-align: center;
        position: relative;
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
    .landing-page .carousel .item{
        background-color: #ffffff !important;
    }
    .landing-page .carousel .item{
        height: 300px;
    }
    .list-group a:focus,active{
        background-color: #00cc66 !important;
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
<?php
$confu = ArrayHelper::toArray($contract_fu, ['common\models\ContractFu' => [
                'fc_id',
                'fuid',
                'contractid'
            ]
        ]);
?>
<div class="modal fade" id="themdenghiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" >
    <div class="modal-content"style="border-radius:10px;" >
      <div class="modal-header" style="background-color: #80ac3d">
        <h4 class="modal-title" id="exampleModalLabel">Thêm yêu cầu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   
        <input type="hidden" class="fuidhiddent" name="fuid">
        <div class="form-group col-md-12" >
            <label  class="col-md-3 col-form-label">Thu hoạch:</label>
            <div  class="col-md-3"></div>
            <input class="col-md-6 soluongthuhoach" style="height: 35px;border-radius:2px;" name="soluong" placeholder="số lượng (kg)">
            <div  class="col-md-6"></div>
            <span class="errsoluong  col-md-6" style="color: red"></span>
        </div>
        <div class="form-group col-md-12">
            <input class="col-md-3 vanchuyendiadiem" name="chechdiadiem" type="checkbox">
            <label class="col-md-3 col-form-label ">Địa điểm nhận:</label>
            <input  name="diadiemnhan" class="col-md-6  diadiemnhanhang"  style="height: 35px;border-radius:2px;"placeholder="Địa điểm nhận hàng">
            <div  class="col-md-6"></div>
            <span class="errdiadiem  col-md-6" style="color: red"></span>
        </div>
        <div class="form-group col-md-12">
            <input class="col-md-3 manlencho" type="checkbox" name="manglencho">
            <label class="form-check-label col-md-6 " >mang lên chợ </label>

        </div>
        <div class="form-group col-md-12">
            <div  class="col-md-6"></div>
            <span class="errdichvu  col-md-6" style="color: red"></span>

        </div>
        <br>
      
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary guithuhoach">Gửi</button>
      </div>
    </div>
  </div>
</div>
<div class="container" style="padding: 50px 0 50px 0;">

    <div class="col-md-3" style="z-index:2; background-color:#ffffff; min-height: 500px">
        <a class="list-group-item  disabled"  data-toggle="list" role="tab" style="background-color: #80ac3d; color: white">Danh sách ruộng</a>
        <div class="list-group" id="myList" role="tablist">
            <a class="list-group-item list-group-item-action" data-id="<?= $confu[0]["fuid"] ?>" data-toggle="list" href="#0" role="tab">FU_<?= $confu[0]["fuid"] ?></a>
            <?php
            $i = 1;
            foreach ($confu as $key => $cf) {
                if ($key > 0) {
                    ?>
                    <a class="list-group-item list-group-item-action" data-toggle="list" data-id="<?= $confu[$i]["fuid"] ?>" href="#<?= $i ?>" role="tab">FU_<?= $confu[$i]["fuid"] ?></a>           
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    $fu_array = array();
    foreach ($confu as $key => $cf) {
        $fu_progress = FuProgress::find()->where(['fuid' => $cf["fuid"]])->orderBy(['date' => 'ASC'])->all();
        $fu_proArray = ArrayHelper::toArray($fu_progress, ['common\models\FuProgress' => [
                        'progressid',
                        'fuid',
                        'date',
                        'img',
                        'description',
                        'Process_name',
                        'step',
                        'status',
                        'created_at',
                        'update_at',
                    ]
        ]);
        $fu_array[$key] = $fu_proArray;
        // var_dump($fu_array[0][0]["description"]);
    }
    ?>
    <div class="col-md-9"style="">
        <div class="tab-content">
            <?php for ($k = 0; $k < count($fu_array); $k++) {
                ?>

                <div class="tab-pane" id="<?= $k ?>" role="tabpanel"> 
                    <?php
                    if (count($fu_array[$k]) > 0) {
                        ?>
                        <div class="col-md-12">
                            <div class="">
                                <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="10500">
                                    <!-- Wrapper for slides -->    
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6"><img src="<?= Url::base() ?>/images/<?= $fu_array[$k][0]['img'] ?>" class="img-responsive"></div>
                                                    <div class="col-md-6">
                                                        <p><span style="font-weight: bold;">Ngày</span> :<?= date('d/m/Y', $fu_array[$k][0]['date']) ?></p>
                                                        <h2 style="font-weight: bold; text-transform: capitalize;"><?= $fu_array[$k][0]['Process_name'] ?></h2>

                                                        <p><?= $fu_array[$k][0]['description'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                        for ($j = 1; $j < count($fu_array[$k]); $j++) {
                                            ?>  
                                            <div class="item">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6"><img  style="width: 90%; height: 90%"src="<?= Url::base() ?>/images/<?= $fu_array[$k][$j]["img"] ?>" class="img-responsive"></div>
                                                        <div class="col-md-6">
                                                            <p><span style="font-weight: bold;">Ngày</span> :<?= date('d/m/Y', $fu_array[$k][$j]['date']) ?></p>
                                                            <h3 style="font-weight: bold; text-transform: capitalize;"><?= $fu_array[$k][$j]['Process_name'] ?></h3>
                                                            <p><?= $fu_array[$k][$j]['description'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>            
                                            </div>  
                                            <?php
                                        }
                                        ?>
                                        <!--end 0-->
                                        <!-- End Item -->
                                    </div>
                                    <!-- End Carousel Inner -->
                                    <a data-slide="prev" href="#custom_carousel" class="izq carousel-control" style="background-color: #80ac3d">‹</a>
                                    <a data-slide="next" href="#custom_carousel" class="der carousel-control" style="background-color: #80ac3d">›</a>
                                    <div class="controls" style="max-height: 150px;">
                                        <ul class="nav">
                                            <li data-target="#custom_carousel" data-slide-to="0" class=""><a href="#"><img src="<?= Url::base() ?>/images/<?= $fu_array[$k][0]['img'] ?>" style="width: 100%; height: 100%"><small><?= date('d/m/Y', $fu_array[$k][0]['date']) ?></small></a></li>
                                            <?php
                                            for ($j = 1; $j < count($fu_array[$k]); $j++) {
                                                ?>  
                                                <li data-target="#custom_carousel" data-slide-to="<?= $j ?>"><a href="#"><img src="<?= Url::base() ?>/images/<?= $fu_array[$k][$j]['img'] ?>" style="width: 100%; height: 100%"><small><?= date('d/m/Y', $fu_array[$k][$j]['date']) ?></small></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Carousel -->
                            </div>

                        </div>
                        <?php
                    } else {
                        echo "khong co vuon";
                    }
                    ?>
                </div>          
            <?php } ?> 
        </div>
    </div>


</div>
<div class="container">

<div class="col-md-12" style="margin-bottom: 30px;" data-toggle="modal" data-target="#themdenghiModal">
        <h3>Danh sách thu hoạch:</h3>
        <div class="danhsachthuhoach col-md-12">

        </div>
        <br>
        <button>Thêm Đề nghị</button>
    </div>

</div>
  <script src="<?= Url::base() ?>/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    $(function () {

        window.onload = function () {
            var fuid = $("body").find(".list-group-item-action").first().data('id');

            $(".fuidhiddent").val(fuid);
              $.ajax({
                    method: "get",
                    url: "/contract/thuhoach",
                   
                    //dataType: 'json',
                    success: function (data) {
                       $('.danhsachthuhoach').html(data);
                    }
                });

            
        };
        $(".list-group-item-action").click(function () {
            $(".fuidhiddent").val($(this).data('id'));
        });

        $('#myList a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
        $(document).ready(function (ev) {
            $('body').find('#custom_carousel').on('slide.bs.carousel', function (evt) {

                $('#custom_carousel .controls li.active').removeClass('active');
                $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
            })
            $('body').find('.list-group-item-action').first().addClass('active');
            $('body').find('.controls ul li').last().trigger('click');
            $('body').find('.tab-pane').first().addClass('active');
            $('body').find('.list-group-item-action').click(function () {
                $('.list-group-item-action').removeClass('active');
                $(this).addClass('active');
                // $('body').find('.controls ul li').last().trigger('click');
            });
        });

        $('.vanchuyendiadiem').click(function () {
            if ($('.vanchuyendiadiem').is(':checked')) {
                $('.manlencho').removeAttr('checked');
                $('.diadiemnhanhang').removeAttr('disabled');
            }

        })
        $('.manlencho').click(function () {
            if ($('.manlencho').is(':checked')) {
                $('.vanchuyendiadiem').removeAttr('checked');
                $('.diadiemnhanhang').val("");
                $('.diadiemnhanhang').attr('disabled', 'disabled');

            }

        });
        $(".guithuhoach").click(function (e) {

            if ($('.soluongthuhoach').val() == "") {
                $('.errsoluong').text("Bạn cần phải nhập số lượng ");
            } else if (!$.isNumeric($('.soluongthuhoach').val()))
            {
                $('.errsoluong').text("Số lượng sản phẩm không đúng");

            } else {
                $('.errsoluong').text("");
            }
            if ($('.vanchuyendiadiem').is(':checked')) {
                if ($('.diadiemnhanhang').val() == "") {

                    $('.errdiadiem').text("bạn cần nhập Địa điểm nhận");
                } else {
                    $('.errdiadiem').text("");
                }

            }
            var i = 0;
            $('input[type=checkbox]').each(function () {
                if ($(this).is(':checked')) {
                    i = 1;
                }
            });
            if (i == 0) {

                $('.errdichvu').text("bạn chưa chọn dịch vụ");
            } else {
                $('.errdichvu').text("");
            }
            if ($('.errdiadiem').text() != "" || $('.errsoluong').text() != "" || $('.errdichvu').text() != "") {

                return  false;
            } else {
                var manglencho=0;
                  if ($('.manlencho').is(':checked')){
                          manglencho=1;
                      }

                $.ajax({
                    method: "post",
                    url: "/contract/thuhoach",
                    data: {
                        fuid: $('.fuidhiddent').val(),
                        soluong: $('.soluongthuhoach').val(),
                        manglencho: manglencho,
                        diadiemnhan:$('.diadiemnhanhang').val()
                    },
                    //dataType: 'json',
                    success: function (data) {
                       
                     $('.danhsachthuhoach').html(data);
                       $('.vanchuyendiadiem').removeAttr('checked');
                        $('.manlencho').removeAttr('checked');
                        soluong: $('.soluongthuhoach').val('');
                       soluong: $('.soluongthuhoach').val('');
                       $('#themdenghiModal').modal("hide");
                    }
                });

            }
        });
         $('body').find('.deleteHavest').click(function(){            
          var id= $(this).attr('data-id');
          alert(id);
        });
         
    })
    
</script>