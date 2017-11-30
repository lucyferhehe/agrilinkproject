<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\fu */

$this->title = 'Create Fu';
$this->params['breadcrumbs'][] = ['label' => 'Fus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
