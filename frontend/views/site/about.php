<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div id="main">
    <div class="page-in signup" >
        <div class="block-page" style="background: #f0f0f0">
            <div class="container">
                <div class="boxstep">
                    <div class="cont">
                        <div class="row" style="margin-top: 50px;align-content:center">
                              <div class="col-md-4" ></div>
                            <div class="col-md-3" >
                                <div class="form-signup">
                                    <div class="panel panel-default" style="background: #f0f0f0">
                                        <?php $form = ActiveForm::begin(); ?>
                                       
                                        <div class="item-input">
                                            <div class="form-group">
                                                <!--<input type="text" class="form-control"  placeholder="Your name">-->
                                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => "Tên đăng nhập"])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="item-input">
                                            <div class="form-group">
                                                <!--<input type="password" class="form-control"  placeholder="Create a password">-->
                                                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => "Mật khẩu"])->label(false); ?>
                                            </div>
                                        </div>

                                        <div class="clearfix item-checkbox">
                                            <div class="style-checkbox check-agree" style="width:25px; float:left;"> 
                                            </div>                                       
                                        </div>
                                        <div class="item-submit">
                                            <!--                                        <a href="signup-step2.html" class="btn btn-danger btn-red">continue</a>-->
                                            <?= Html::submitButton(' &nbsp; Login &nbsp;', ['class' => 'btn btn-lg btn-success btn-block','style'=>'background-color:#80ac3d', 'name' => 'continue']) ?>
                                        </div>
                                        <?php ActiveForm::end(); ?>
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