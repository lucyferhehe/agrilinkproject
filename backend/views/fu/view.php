<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\fu */

$this->title = $model->fuid;
$this->params['breadcrumbs'][] = ['label' => 'Fus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fuid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fuid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fuid',
            'fu_long',
            'fu_lat',
            'fu_width',
            'fu_height',
            'fu_price',
            'contract_id',
        ],
    ]) ?>

</div>
