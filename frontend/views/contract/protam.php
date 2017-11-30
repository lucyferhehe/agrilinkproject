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
    <div class="page-in my-profile">
        <div class="block-page">
            <div class="container">
                <div class="your-notification">
                    <p class="title-box">Thông tin của bạn: </p>
                    <ul class="list-notifica">
                        <li>Name: <?= Yii::$app->user->identity->username ?></li>
                        <li>Email:<?= Yii::$app->user->identity->email ?></li></li>
                        <li>Phone:<?= Yii::$app->user->identity->phone ?></li></li>
                        <li>adress:<?= Yii::$app->user->identity->address ?></li></li>
                    </ul>
                </div>
                <div class="filter-transactions">
                    <h3>Hợp đồng của bạn:</h3>
                </div>
                <div class="table-transactions">
                    <table class="table table-bordered table-striped">
                        <tbody>                          
                            <?php foreach ($query as $que) { 
                                if($que["status"]!=0){
                                    $gia = 0;
                                ?>
                                <tr>
                                    <td class="width-116">Hợp đồng:<?= $que["contract_code"] ?>
                                        <br>
                                        <?php if ($que["status"] == 0) { ?>
                                            <button data-id="<?= $que["contract_code"] ?>" class="thuongthao" style="height:40px;border-radius: 5px; font-weight: bold">Thương thảo</button>
                                        <?php } else if ($que["status"] == 1) { ?>
                                            <button data-id="<?= $que["contract_code"] ?>" class="dangcho" style="height:40px;border-radius: 5px; font-weight: bold">Đang chờ</button>
                                        <?php } else { ?>
                                            <div style="background-color:">pending</div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <table class="table table-bordered table-striped">
                                            <?php                                            
                                            // $fu = ContractFu::find()->where(['contractid' => $que["contract_code"]])->all();
                                            $sqlfu = 'select a.fc_id,a.fuid,a.contractid,b.fu_price from contract_fu a join fu b on a.fuid=b.fuid where contractid=' . $que["contract_code"];
                                            $fu = Yii::$app->db->createCommand($sqlfu)->queryAll();
                                            foreach ($fu as $f) {
                                                $sql = 'select product_name from products a join product_fu b on a.product_id=b.product_id WHERE b.fuid=' . $f['fuid'];
                                                $sp = Yii::$app->db->createCommand($sql)->queryOne();
                                                $gia += $f["fu_price"];
                                                ?>
                                                <tr>
                                                    <td style="width: 30%">ruong:<?= $f['fuid'] ?></td>
                                                    <td style="width: 30%"><?= $sp["product_name"] ?></td>
                                                    <td style="width: 30%">giá: <?= $f['fu_price'] ?> Đồng</td>
                                                </tr>
                                               
                                            <?php } ?>
                                                 <tr>
                                                    <td colspan="3"> Tổng giá: <?= $gia ?> đồng</td>
                                                    
                                                </tr>
                                        </table>
                                    </td>
                                    <?php
                                    $sql2 = 'SELECT a.service_id,service_name,price from services a join contract_service b on a.service_id= b.service_id where b.contract_no=' . $que["contract_code"];
                                    $service = Yii::$app->db->createCommand($sql2)->queryAll();
                                    ?>
                                    <td>Dịch vụ kèm theo:<br>
                                        <?php
                                        if (count($service) > 0)
                                            foreach ($service as $ser) {
                                                echo $ser["service_name"];
                                                echo "    gia:  ";
                                                echo $ser["price"];
                                                echo ' Đồng';
                                                echo "<br>";
                                                $gia += $ser["price"];
                                            }
                                        $sql3 = 'SELECT a.name, a.description from service_different a join contract b on a.contractID=b.contract_code  where b.contract_code=' . $que["contract_code"];
                                        $service_different = Yii::$app->db->createCommand($sql3)->queryAll();

                                        if (count($service_different) > 0) {
                                            echo"Dịch vụ cộng thêm:";
                                            echo "<br>";
                                            $i=1;
                                            foreach ($service_different as $ser2) {                                               
                                                echo 'dich vu'.$i.':   ';
                                                echo $ser2["description"];
                                                echo "<br>";
                                                $i++;
                                                //$gia += $ser["price"];
                                            }
                                        }
                                        ?>
                                        <!--<button  class="buttonmodalService"data-id="<?= $que["contract_code"] ?>"style="float:bottom"data-toggle="modal" data-target="#modalAddService">đề nghị dịch vụ</button>-->
                                    </td>

                                </tr>
<?php } }?>
                            <tr>
                                <td colspan="3">                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= Url::base() ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.thuongthao').click(function () {
            $that= $(this);
            id = $(this).data('id');
            $.ajax({
                method: "post",
                url: "/contract/thuongthao",
                data: {
                    id: id
                },
                //dataType: 'json',
                success: function (data) {
                    if(data.code==100){
                        $that.removeClass('thuongthao').addClass('dangcho');
                        $that.text('Đang chờ');
                    }
                }
            });
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
                        if(data.code==100){
                        console.log("aaaaa");
                       window.location.href = "/contract/profile"; 
                    }
                    }
                });

            }
        });
    });

</script>