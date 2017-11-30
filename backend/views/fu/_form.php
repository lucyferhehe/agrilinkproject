<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\fu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fuid')->textInput() ?>

    <?= $form->field($model, 'fu_long')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fu_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fu_width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fu_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fu_price')->textInput() ?>

    <?= $form->field($model, 'contract_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
