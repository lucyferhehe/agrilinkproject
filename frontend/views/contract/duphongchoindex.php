<?php

use yii\helpers\Url;

$uid = Yii::$app->user->getId();
?>
<script type="text/javascript">

</script>

<div id="main">
    <div class="page-in my-profile">
        <div class="block-page">
            <div class="container" >
                <div class="box-mProfile" >
                    <div class="top-mProfile"style="background:#9bcb5b">
                        <h1 class="title">Địa Điểm Vườn:</h1>
                    </div>
                    <div class="cont-mProfile">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="your-infomation">

<!--<p class="top clearfix"><span class="title-box">Gardent Map:</span></p>-->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6470074342756!2d105.76310091450512!3d21.0468055859886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454c4651615c7%3A0x671d379f7ccad3fa!2zQ8O0bmcgVHkgQ3AgR2nhuqNpIFBow6FwIEPDtG5nIE5naOG7hyBHbw!5e0!3m2!1sen!2s!4v1509829021914" width="750" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="your-current-package">
                                    <p class="top clearfix"><span class="title-box">weather: </span></p>

                                    <p class="description">Gefühlte Temperatur: 12°C</p>
                                    <p class="description">Aktueller Luftdruck: 1010 mb</p>
                                    <p class="description">Luftfeuchtigkeit: 80%</p>
                                    <p class="description">Wind: 0 m/s SSW</p>
                                    <p class="description">Böen: 1 m/s</p>
                                    <p class="description">UV-Index: 0</p>

                                    <p class="description"></p>
                                    <p class="description">Böen: 1 m/s</p>
                                    <table>

                                        <tr>
                                            <td> <img src="images/04.gif" alt=""/></td><td>Wolkig</td>                                          

                                        </tr>
                                        <tr>
                                            <td> </td><td>10°C</td>                                          

                                        </tr>
                                        <tr>
                                            <td> </td><td>Wind: 1 m/s </td>                                          

                                        </tr>

                                        <tr>
                                            <td>  <img src="images/12.gif" alt=""/></td><td>Regenschauer</td>

                                        </tr>
                                        <tr>
                                            <td> </td><td>8°C</td>                                          

                                        </tr>
                                        <tr>
                                            <td> </td><td>Wind: 2 m/s S</td>                                          
                                        </tr>


                                    </table>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p style="height:20px;background-image:url(<?= Url::base() ?>/images/zaun.png)"></p> 
                <?php if (!Yii::$app->user->isGuest) { ?>
                    <div class="your-notification">
                        <p class="title-box"><a href="<?= Url::to('/contract/contract') ?>/" class="btn btn-danger btn-red" style="background-color: #9bcb5b; margin-top: -0.5%">Tạo hợp đồng thuê</a></p>
                    </div>
                <?php } ?>
                <form action="contract/createcontract">
                    <input type="hidden" value="<?= $uid ?>" name="userid">                   
                    <div class="table-transactions " >
                        <table>
                            <tr>
                                <td style="padding-right: 10px;">
                                    <p style="font-weight:bold"> Sản Phẩm:</p>
                                    <table class="table table-bordered table-striped" >

                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Havest Tine</th>
                                                <th>Price</th>
                                                <!--<th>desctiption</th>-->
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pro as $pr) { ?>
                                                <tr>
                                                    <td><?= $pr->product_id ?></td>
                                                    <td> <?= $pr->product_name ?></td>

                                                    <td><?= $pr->harvest_time ?></td>
                                                    <td><?= $pr->price ?>$</td>
                                                    <td><input type="checkbox" name="checkboxProduct<?= $pr->product_id ?>" value="<?= $pr->product_id ?>"></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-left: 10px;">
                                    <p style="font-weight: bold"> Select your SerVice:  </p>
                                    <table class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>Service Id</th>
                                                <th>Service Name</th>
                                                <th >Price</th>
                                                <th >Status</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ser as $se) { ?>
                                                <tr>
                                                    <td><?= $se->service_id ?></td>
                                                    <td><?= $se->service_name ?></td>
                                                    <td><?= $se->price ?>$</td>
                                                    <th ><?= $se->status ?></th>
                                                    <td><input type="checkbox" name="checkboxService<?= $se->service_id ?>" value="<?= $se->service_id ?>"></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
<!--                        <div class="filter-transactions">
                            <input type="submit" value="submit">
                        </div>-->
                    </div>
                </form>
                <p style="height:20px;background-image:url(<?= Url::base() ?>/images/zaun.png)"></p> 
                <div class="" style="height:1200px;;background-image:url(<?= Url::base() ?>/images/acker.jpg)">

                    <?php foreach ($fu as $f) { ?>
                        <div class="col-md-2" style="color: white">
                            <h3> Mast<?= $f->fuid ?></h3>
                            <div class="su-list su-list-style-">
                                <ul>
                                    <li><i class="fa fa-dot-circle-o" style="color:#333"></i> long: <?= $f->fu_long ?></a></li>
                                    <li><i class="fa fa-dot-circle-o" style="color:#333"></i> lat:<?= $f->fu_lat ?></a></li>
                                    <li><i class="fa fa-dot-circle-o" style="color:#333"></i> with:<?= $f->fu_width ?></a></li>
                                    <li><i class="fa fa-dot-circle-o" style="color:#333"></i> hegth: <?= $f->fu_height ?></a></li></ul>
                                <li><i class="fa fa-dot-circle-o" style="color:#333"></i> hegth: <?= $f->fu_price ?></a></li></ul>

                                <?php if ($f->contract_id == 0) {
                                    ?>
                                    <li style=""><i class="fa fa-dot-circle-o" ></i> cho thue</li></ul>
                                    <li></li></ul>
                                <?php } else { ?>
                                    <li style=""><i class="fa fa-dot-circle-o" style="color:#9bcb5b"></i> da duoc thue</li></ul>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <p style="height:20px;background-image:url(<?= Url::base() ?>/images/zaun.png)"></p> 
            </div>
        </div>
    </div>
</div>

