<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div id="main" style="padding-bottom: 10px;background: #f0f0f0;padding-top: 10px;background-image: url(<?=Url::base()?>/images/anhnenvuon2.jpg);background-repeat: no-repeat; background-size: cover;">
    <div class="page-in signup" >
        <div class="block-page" style="">
            <div class="container">
                <div class="boxstep">
                    <div class="cont">
                        <div class="row" >
                            <div class="col-md-8" >
                                <div class="info-step">
                                </div>
                            </div>
                            <div class=" col-md-4" style="border-radius:20px;background-color:#ffffff;padding-top: 20px;padding-bottom:  90px;opacity:0.95">
                                <div class="form-signup">
                                     <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                                    <div class="item-input">
                                        <div class="">
                                             <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'form-control', 'placeholder'=>"Email/Số điện thoại"])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="item-input">
                                        <div class="">
                                             <?= $form->field($model, 'fistname')->textInput(['class'=>'form-control', 'placeholder'=>"Tên"])->label(false); ?>
                                        </div>
                                    </div>
                                     <div class="item-input">
                                        <div class="">
                                             <?= $form->field($model, 'lastname')->textInput(['class'=>'form-control', 'placeholder'=>"Họ đệm"])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="item-input">
                                        <div class="">

                                            <!--<input type="password" class="form-control"  placeholder="Create a password">-->
                                              <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder'=>"Mật khẩu"])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="item-input">
                                        <div class="">

                                            <!--<input type="password" class="form-control"  placeholder="Confirm password">-->
                                             <?= $form->field($model, 'confirm_password')->passwordInput(['class'=>'form-control', 'placeholder'=>"Nhắc lại mật khẩu"])->label(false); ?>
                                        </div>
                                    </div>
<!--                                    <div class="clearfix item-checkbox">
                                        <div class="style-checkbox check-agree" style="width:25px; float:left;"> 
                                            <div class="checkbox checkbox-circle">                                                                                            
                                                <input id="checkbox8" class="styled" type="checkbox">
                                                <label for="checkbox8"> </label>
                                            </div> 

                                        </div>
                                        <p class="description">I agree to the Metrixa AdManager <a href="#" title="#">terms & condition</a> and <a href="#" title="#">privacy policy</a></p>
                                    </div>-->
                                    <div class="item-submit">
<!--                                        <a href="signup-step2.html" class="btn btn-danger btn-red">continue</a>-->
                                         <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-success', 'name' => 'continue']) ?>
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