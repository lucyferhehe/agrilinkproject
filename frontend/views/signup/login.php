<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div id="main" >
    <div class="page-in signup">
        <div class="block-page" style="background: #f0f0f0">
            <div class="container">
                <div class="boxstep" style="margin-top: 200px;">
                    <div >
                     
                    </div>
                    <div class="container">
                        <div class="container">
                            <div class="col-md-3"></div>
                            <div class="col-sm-12 col-md-5" >
                                <div class="title">Login</div>
                                <div class="form-signup">
                                    <?php $form = ActiveForm::begin(); ?>
                                    <div class="item-input">
                                        <div class="form-group">
                                            <!--<input type="text" class="form-control"  placeholder="Your name">-->
                                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => "Your name"])->label(false); ?>
                                        </div>

                                    </div>
                                    <div class="item-input">
                                        <div class="form-group">

                                            <!--<input type="password" class="form-control"  placeholder="Create a password">-->
                                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => "Create a password"])->label(false); ?>
                                        </div>
                                    </div>

                                    <div class="clearfix item-checkbox">
                                        <div class="style-checkbox check-agree" style="width:25px; float:left;"> 
<!--                                            <div class="checkbox checkbox-circle">                                                                                            
                                                <input id="checkbox8" class="styled" type="checkbox">
                                                <label for="checkbox8"> </label>
                                            </div> -->
                                             

                                        </div>
                                        
                                    </div>
                                    <div class="item-submit">
                                        <!--                                        <a href="signup-step2.html" class="btn btn-danger btn-red">continue</a>-->
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-danger btn-red', 'name' => 'continue']) ?>
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