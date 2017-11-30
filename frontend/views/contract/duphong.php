

<?php

use yii\helpers\Url;

$uid = Yii::$app->user->getId();
?>
<script type="text/javascript">
function allowDrop(ev) {
       
        ev.preventDefault();
    }
    function drag(ev) {
      
        ev.dataTransfer.setData('text',ev.target.id);

    }
   
    function drop(ev) {

        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
//       ev.target.appendChild('<div class="col-md-4"><div class="thumbnail" href="#" style="height: 300px;background-image:url(<?= Url::base() ?>/images/acker.jpg)" ></div></div>');
       
    }
</script>

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
                                 <?php foreach ($fu as $f) { ?>                            
                                <li draggable="true" ondragstart="drag(event)" class="addok"><a href="#" data-id="<?=$f->fuid?>">ruong: <?=$f->fuid?></a><button style="float: right; height: 23px; border-radius:5px; background-color:#9bcb5b">add</button></li>
                                 <?php }?>                               

                            </ul>
                        </div>

                    </div>
                    <div class="container">
                        <div class="col-md-5">  
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class="carousel slide media-carousel" id="media">
                                        <div class="carousel-inner">
                                            <div class="item  active">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>          
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/toi.jpg"></a>
                                                    </div>  
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/toi.jpg"></a>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/toi.jpg"></a>
                                                    </div>          
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/toi.jpg"></a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>  
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>          
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>  
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                        <a data-slide="next" href="#media" class="right carousel-control">›</a>
                                    </div>                          
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class="carousel slide media-carousel" id="media">
                                        <div class="carousel-inner">
                                            <div class="item  active">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>          
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>    
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>          
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/toi.jpg"></a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/toi.jpg"></a>
                                                    </div> 
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>

                                                    </div>          
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div>  
                                                    <div class="col-md-3">
                                                        <a class="thumbnail" href="#"><img alt="" src="<?= Url::base() ?>/images/carot.png"></a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <a data-slide="prev" href="#media" class="left carousel-control"></a>
                                        <a data-slide="next" href="#media" class="right carousel-control"></a>
                                    </div>                          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 fu_contract" ondrop="drop(event)" ondragover="allowDrop(event)"style="min-height: 500px;">
                               <div class="col-md-4"><div class="thumbnail" href="#" style="height: 200px;background-image:url(<?= Url::base() ?>/images/acker.jpg)" >
                                       <!--<i class="fa fa-times-circle" aria-hidden="true" style=""></i>--> 
                                       <img src="<?= Url::base() ?>/images/tn.jpg" style="width:40%; height: 40%"alt=""/>
                                        <br>
                                        <img src="<?= Url::base() ?>/images/toi.jpg" style="width:40%; height:40%"alt=""/>
                                   </div> </div>
                        </div>
                    </div>
                </div>
                <form action="contract/createcontract">
                    <input type="hidden" value="<?= $uid ?>" name="userid">
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
<script src="<?= Url::base() ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
                            $(document).ready(function () {
                                  $('.top-level li').click(function(){
                                      if($(this).hasClass('addok')){
                                          $('.fu_contract').append('<div class="col-md-4"><div class="thumbnail" href="#" style="height: 200px;background-image:url(<?= Url::base() ?>/images/acker.jpg)" ></div></div>');
                                      $(this).css('background-color','yellow');
                                      $(this).find('button').remove();
                                      $(this).removeClass('addok');
                                      }
                                      
                                  }) ;
                                  $('.carousel-inner div div div a').mousemove(function(){
                                     var srcimg= $(this).children().attr('src');
                                                     
                                  })
                            });

</script>
