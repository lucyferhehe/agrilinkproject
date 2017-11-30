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
<?= Yii::$app->session->getFlash('success'); ?>
<?php ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn  cần nhập thêm thông tin để đăng ký hợp đồng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <span style="font-weight: bold;">Địa chỉ :</span>	 <input class="form-control" type="text">
    <span style="font-weight: bold;">Số cmnt:</span> <input class="form-control" type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalAddService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #9bcb5b">
                <h5 class="modal-title" id="exampleModalLabel" >Thông tin dịch vụ mà bạn muốn đề nghị</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="width: 100%">
                    <tr style="padding: 2px; display: none">
                        <td>name:</td>
                        <td> <input type="text" style="width: 80%; border-radius:4px"class="serviceAddName"></td>
                    </tr>
                    <tr style="padding: 2px">
                        <td>thông tin:</td>
                        <td> <textarea rows="8" style="width:80%; border-radius:4px;" ></textarea></td>
                    </tr>
                    <tr style="padding: 2px">
                        <td ></td>
                        <td><span style="color: red" class="addseviceError"></span></td>
                    </tr>
                </table>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary addservice">Save</button>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="page-in my-profile"style="padding-bottom: 50px; ">
        <div class="block-page">
            <div class="container" style="border:2px solid">
                <div class="box-mProfile" >
                    <div class="top-mProfile">
                        <h1 class="title"style="font-weight: bold;">Nội dung Hợp Đồng:</h1>
                    </div>
                    <div class="cont-mProfile">
                        <div class="row" >
                            <div class="col-sm-6">
                                <div class="your-infomation">                           	
                                    <p class="top clearfix" style="height: 50px"><span class="title-box"style="font-weight: bold;">&nbsp;&nbsp;Bên A:</span><a href="#" class="edit-infomation"><i class="icon icon-edit"></i>Edit </a></p>
                                    <ul class="list-notifica">
                                        <li>Name: Công ty</li>
                                        <li>Email:congty@gmail.com</li></li>
                                        <li>Phone:02344343</li></li>
                                        <li>adress:Ha noi</li></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="your-infomation">                           	
                                    <p class="top clearfix" style="height: 50px"><span class="title-box" style="font-weight: bold;">Bên B:</span><a href="#" class="edit-infomation"><i class="icon icon-edit"></i>Edit </a></p>
                                    <ul class="list-notifica">
                                        <li>Name: <span class="nameUser"><?= Yii::$app->user->identity->username ?></span></li>
                                        <li>Email:<span class="emailUser"><?= Yii::$app->user->identity->email ?></span></li></li>
                                        <li>Phone:<span class="phoneUser"><?= Yii::$app->user->identity->phone ?></span></li></li>
                                        <li>adress:<span class=""><?= Yii::$app->user->identity->address ?></span></li></li>
                                   		 <input type="hidden" value="<?= Yii::$app->user->identity->address ?>" class="addressUser">
                                   		 <input type="hidden" value="<?= Yii::$app->user->identity->so_cmt ?>" class="cmtUser">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="your-notification" style="padding-top:20px;border-top: 1px solid">
                    <p class="title-box" style="font-weight: bold;margin-left:20px;font-size:18px">Các điều khoản bắt buộc: </p>
                    <ul class="list-notifica">
                        <li>Vị trí:  ngõ 165 dương quảng hàm cầu giáy hà nội</li>
                        <li>Yêu cầu: khi thực hiện hợp đồng- các khoản thanh toán đều phải hoàn thành</li>
                        <li>Dịch vụ vận chuyển sẽ không quá 10km, nếu quá sẽ thêm chi phí</li>
                        <li>Không chịu trách nhiệm do thiên tai</li></li>
                    </ul>
                </div>

                <div class="filter-transactions" style="padding-top:20px;border-top: 1px solid">
                    <h3>Chi tiết hợp đồng:</h3>
                </div>
                <input type="hidden" value="<?= $que["contract_code"] ?>" class="hopdongan">
                <div class="table-transactions">
                    <table class="table table-bordered table-striped">

                        <tbody>                          
                            <?php
                            $gia = 0;
                            ?>
                            <tr>
<!--                                <td class="width-116">Hợp đồng:<?= $que["contract_code"] ?>
                                    <br>

                                </td>-->

                                <td>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th >STT</th>
                                            <th>FU</th>
                                            <th >Loại cây trồng</th>
                                            
                                            <th >Đơn Giá</th>
                                            <th >Thành tiền</th>

                                        </tr>
                                        <?php
                                        $stt = 0;
                                        // $fu = ContractFu::find()->where(['contractid' => $que["contract_code"]])->all();
                                        $sqlfu = 'select a.fc_id,a.fuid,a.contractid,b.fu_price from contract_fu a join fu b on a.fuid=b.fuid where contractid=' . $que["contract_code"];
                                        $fu = Yii::$app->db->createCommand($sqlfu)->queryAll();
                                        foreach ($fu as $f) {
                                            $stt++;
                                            $sql = 'select product_name from products a join product_fu b on a.product_id=b.product_id WHERE b.fuid=' . $f['fuid'];
                                            $sp = Yii::$app->db->createCommand($sql)->queryOne();
                                            $gia += $f["fu_price"];
                                            ?>
                                            <tr>
                                                <td style="width: 10%"><?= $stt ?></td>
                                                <td style="width: 10%">FU0<?= $f['fuid'] ?></td>
                                                <td style="width: 20%"><?= $sp["product_name"] ?></td>                                              
                                                <td style="width: 20%">giá: <?= $f['fu_price'] ?> Đồng</td>
                                                <td style="width: 20%">giá: <?= $f['fu_price'] ?> Đồng</td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                   
                                </td>
                            </tr>                           
                            </tr>
                            <tr>
                                <td colspan="3" style=""> <span style="float: right; margin-right: 15%">Tổng giá: <?= $gia ?> đồng</span></td>
                            </tr>     
                        </tbody>
                    </table>
                    <div class="filter-transactions">
                    <?php if($que['status']==0){?>
                   
                        <button class="btn btn-success luuhopdaong" style="margin-bottom:10px;" data-toggle="modal" data-target="#exampleModal">Giao dịch</button>
                         <button class="btn btn-success " style="margin-bottom:10px;">Sửa</button>
                        <?php }else if($que['status']==1) {?>
                         <button class="btn btn-success " style="margin-bottom:10px;">Sửa</button>
                         <?php }else if($que['status']==2){?>
                          <button class="btn btn-success " style="margin-bottom:10px;">Xem quá trình</button>
                          <?php }?>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= Url::base() ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.luuhopdaong').click(function (e) {   
            if($('.addressUser').val()==""||$('.cmtUser').val()=="") {
                
               
                }  else{
                	 $that = $(this);
                     id = $('.hopdongan').val();
                     $.ajax({
                         method: "post",
                         url: "/contract/thuongthao",
                         data: {
                             id: id
                         },
                         //dataType: 'json',
                         success: function (data) {
                             if (data.code == 100) {
                                 window.location.href = "/contract/profile";
                             }
                         }
                     });

                    }
           
           
        });
        $('.buttonmodalService').click(function () {
            var id = $(this).data('id');
            $('.addservice').attr('data-id', id);
        });
        $('.addservice').click(function () {
            var id = $('.addservice').data('id');

            if ($('textarea').val() == "") {
                $('.addseviceError').text("Xin moi nhap thong tin dich vu can de nghi!")
                return false;
            } else {
                var description = $('textarea').val();
                var name = $('.serviceAddName').val();
                //console.log(name);
                $.ajax({
                    method: "post",
                    url: "/contract/addservice",
                    data: {
                        id: id,
                        description: description,
                        name: name
                    },
                    //dataType: 'json',
                    success: function (data) {
                        if (data.code == 100) {
                            console.log("aaaaa");
                            window.location.href = "/contract/chitiethopdong?hopdong=" +<?= $que["contract_code"] ?>;
                        }
                    }
                });

            }
        });
    });

</script>