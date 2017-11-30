<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<style>
    .panel-default {
        opacity: 0.9;
        margin-top:50px;
    }
    .form-group.last { margin-bottom:0px; }
</style>
<div class="" style="background-image:Url(<?= Url::base() ?>/images/anhnenvuon.jpg);padding-bottom: 120px;">

    <div class="row" \>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">
                    <span class="glyphicon"></span> Đăng nhập Agrilink</div>
                <div class="panel-body">

                    <?php $form = ActiveForm::begin(['class' => 'form-horizontal', 'method' => 'post']); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">
                            Tên đăng nhập</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => "Email/Số điện thoại"])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">
                            Mật khẩu</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => "Mật khẩu"])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-4 col-sm-8">

                            <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-success btn-sm',  'name' => 'continue']) ?>
                            <?php ActiveForm::end(); ?>
                            <button type="reset" class="btn btn-success btn-sm">
                                Làm mới</button>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    </div>
            </div>
        </div>
    </div>
</div>