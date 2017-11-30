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

$uid = (int) Yii::$app->user->getId();
$sql = "select sum(d.fu_price) as totalprice,  a.start_date,a.end_date,a.created_at, a.contract_code,a.status FROM contract a join 
member_contract b on a.contract_code=b.contract_no join contract_fu c ON b.contract_no=c.contractid join fu d on d.fuid=c.fuid  
 where b.uid= $uid GROUP BY a.contract_code";
$query = Yii::$app->db->createCommand($sql)->queryAll();
$st0 = 0;
$st1 = 0;
$st2 = 0;
$st3 = 0;
foreach ($query as $item) {
    if ($item['status'] == 0) {
        $st0++;
        
    }
    if ($item['status'] == 1) {
        $st1++;
        
    }
    if ($item['status'] == 2) {
        $st2++;
        
    }
    if ($item['status'] == 3) {
        $st3++;
        
    }
}
?>
<?= Yii::$app->session->getFlash('success');
?>
<?php ?>
<div id="main" style="padding-bottom: 100px;padding-top: 20px;">
    <div class="page-in my-profile">
        <div class="block-page">
            <div class="container" style="padding-top: 10px;padding-bottom: 10px">
                <div class="box-mProfile">
                    <div class="top-mProfile" style="background-color: white">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group" id="myList" role="tablist">
                                    <a class="list-group-item list-group-item-action " data-toggle="list" href="#running" role="tab">Hợp đồng đang thực hiện<span class="badge badge-primary badge-success"><?= $st2 ?></span></a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#pendding" role="tab">Hợp đồng chờ thương thảo<span class="badge badge-primary badge-info"><?= $st1 ?></span></a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#doing" role="tab">Hợp đồng đang soạn thảo<span class="badge badge-primary badge-danger"><?= $st0 ?></span></a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#done" role="tab">Hợp đồng đã thanh lý<span class="badge badge-primary badge-primary"><?= $st3 ?></span></a>
                                </div>
                                <div><button type="button" onclick="location.href = '<?= Url::to('/contract/contract') ?>'" class="btn btn-success">Thêm hợp đồng</button></div>
                            </div>
                            <!-- Tab panes -->                           
                            <div class="col-md-9">                           	
                                <div class="tab-content">
                                    <div class="tab-pane active hopdongdangthuchien" id="running" role="tabpanel">
                                    <h2 align="center">Hợp dồng đang thực hiện</h2>
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Mã hợp đồng</th>
                                                    <th scope="col">Ngày bắt đầu</th>
                                                    <th scope="col">Ngày kết thúc</th>
                                                    <th scope="col" >Giá trị (đồng)</th>
                                                    
                                                    <th scope="col">chức năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stt = 0;
                                                foreach ($query as $que) {
                                                    if ($que["status"] == 2) {
                                                        $stt++;
                                                        $mDetail="select * from contract_fu where contractid=".$que["contract_code"];
                                                        ?>
                                                        <tr>
                                                            <th scope="row" align="center"><?= $stt ?></th>
                                                            <td>HD-<?= $que["contract_code"] ?></td>
															 <td><?= date('d-M-Y', $que["start_date"])?></td>
                                                            <td><?= date('d-M-Y', $que["end_date"])?></td>
                                                            <td><?= $que["totalprice"] ?></td>
                                                            
                                                            <td><button type="button" onclick="location.href = '<?= Url::to('/contract/viewprogress?contract_code=' . $que["contract_code"]) ?>'"class="btn btn-success">Xem quá trình</button>&nbsp;
                                                          	 <button onclick="location.href = '<?= Url::to('/contract/chitiethopdong?hopdong=' . $que["contract_code"]) ?>'"class="btn btn-success" style="background-color: #1ab394">Chi tiết</button>
                                                            </td>
                                                        </tr>
    <?php }
} ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="pendding" role="tabpanel">
                                     <h2 align="center">Hợp dồng đang chờ thương thảo</h2>
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Mã hợp dồng</th>
                                                    <th scope="col">Ngày soạn thỏa</th>                                                
                                                    <th scope="col">Giá trị(đồng)</th>
                                                    <th scope="col">Chức năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stt = 0;
                                                foreach ($query as $que) {
                                                    if ($que["status"] == 1) {
                                                        $stt++;
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?= $stt ?></th>
                                                            <td>HD-<?= $que["contract_code"] ?></td>
                                                            <td><?= date("d/M/Y", $que["created_at"])?></td>
                                                          <td><?= $que["totalprice"] ?></td>
                                                            <td><button type="button" onclick="location.href = '<?= Url::to('/contract/chitiethopdong?hopdong=' . $que["contract_code"]) ?>'"class="btn btn-success">Chi tiết</button>&nbsp;<button type="button" class="btn btn-info">Chỉnh sửa</button></td>
                                                        </tr>
    <?php }
} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="doing" role="tabpanel">
                                   <h2 align="center">Hợp dồng đang soạn thảo</h2>
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                   <th scope="col">STT</th>
                                                    <th scope="col">Mã hợp đồng</th>
                                                    <th scope="col">Ngyaf bắt đầu</th>
                                                    
                                                    <th scope="col">Giá trị(đồng)</th>
                                                    <th scope="col">Chức năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stt = 0;
                                                foreach ($query as $que) {
                                                    if ($que["status"] == 0) {
                                                        $stt++;
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?= $stt ?></th>
                                                            <td>HD-<?= $que["contract_code"] ?></td>
                                                            <td><?=date('d/M/Y', $que["created_at"]) ?></td>
                                                            <td><?= $que["totalprice"] ?></td>

                                                            <td><button type="button" onclick="location.href = '<?= Url::to('/contract/chitiethopdong?hopdong=' . $que["contract_code"]) ?>'" class="btn btn-success">Chi tiết</button>&nbsp;<button type="button" class="btn btn-info">CHỉnh sửa</button></td>

                                                        </tr>
    <?php }
} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="done" role="tabpanel">
                                    <h2 align="center">Hợp đồng đã thanh lý</h2>
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                   <th scope="col">STT</th>
                                                    <th scope="col">Mã hợp đông</th>
                                                    <th scope="col">Ngày bắt đầu</th>
                                                    <th scope="col">Ngày kết thúc</th>
                                                    <th scope="col">Giá trị(đồng)</th>
                                                    <th scope="col">Chức năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stt = 0;
                                                foreach ($query as $que) {
                                                    if ($que["status"] == 3) {
                                                        $stt++;
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?= $stt ?></th>
                                                            <td>HD-<?= $que["contract_code"] ?></td>
                                                            <td><?= date('d/M/Y', $que["start_date"]) ?></td>
                                                            <td><?=date('d/M/Y', $que["end_date"])?></td>
                                                            <td><?= $que["totalprice"] ?></td>
                                                            <td><button type="button" onclick="location.href = '<?= Url::to('/contract/chitiethopdong?hopdong=' . $que["contract_code"]) ?>'" class="btn btn-success">Chi tiết</button>&nbsp;
<!--                                                             <button type="button" class="btn btn-info">Lá»‹ch sá»­ sáº£n pháº©m</button></td> -->

                                                        </tr>
    <?php }
} ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= Url::base() ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
                    $(document).ready(function () {
                    	 $('#myList a').first().addClass('active');
                        $('#myList a').on('click', function (e) {
                            e.preventDefault();
                            $('#myList a').removeClass('active');
                            $(this).addClass('active')
                           
                            $(this).tab('show')
                        })
                        $('.thuongthao').click(function () {
                            $that = $(this);
                            id = $(this).data('id');
                            $.ajax({
                                method: "post",
                                url: "/contract/thuongthao",
                                data: {
                                    id: id
                                },
                                //dataType: 'json',
                                success: function (data) {
                                    if (data.code == 100) {
                                        $that.removeClass('thuongthao').addClass('dangcho');
                                        $that.text('Ãƒâ€žÃ¯Â¿Â½ang chÃƒÂ¡Ã‚Â»Ã¯Â¿Â½');
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
                                        if (data.code == 100) {
                                            console.log("aaaaa");
                                            window.location.href = "/contract/profile";
                                        }
                                    }
                                });

                            }
                        });
                    });

</script>