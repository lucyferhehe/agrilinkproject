<?php 
use yii\helpers\Url;
use common\models\Products;
use yii\helpers\ArrayHelper;
?>
<style>
    .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
</style>
    <div class="row col-md-12 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã FU</th>
            <th>sản phẩm</th>
            <th>Khối lượng thu hoạch</th>
            <th>Ngày vận chuyển</th>
            <th>Hình Thức</th>
            <th>Địa chỉ vận chuyển</th>
            <th>Hình ảnh</th>
            <th>chức năng</th>
           
        </tr>
    </thead>
    <?php
    $stt=1;
    foreach ($havests as $hav){?>
            <tr>
                <td><?=$stt?></td>
                <td>FU0<?=$hav->FuID?></td>
                 <td> <?=$hav->masp?></td>
                 <td><?=$hav->khoiluong_thuhoach?></td>
                  <td><?= date('d-m-Y', $hav->Ngayvanchuyen)?></td>
                   <td><?php $hav->hinhthucvanchuyen==1? $text="Đưa lên chợ online":$text=" vận chuyển đến nơi yeu cầu";  ?><?=$text?></td>
                    <td><?=$hav->daichivanchuyen?></td>
                    <td><?=$hav->hinhanh?></td> 
                    <td><button>sửa</button> <button class="deleteHavest" data-id="<?=$hav->havest_ID?>">xóa</button></td>
            </tr>
    <?php $stt++;
    
    }?>
           
    </table>
    </div>
