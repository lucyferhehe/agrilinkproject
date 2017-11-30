<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\fu */

$this->title = 'Update Fu: ' . $model->fuid;
$this->params['breadcrumbs'][] = ['label' => 'Fus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fuid, 'url' => ['view', 'id' => $model->fuid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
