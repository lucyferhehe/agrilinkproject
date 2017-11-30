<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fuid',
            'fu_long',
            'fu_lat',
            'fu_width',
            'fu_height',
             'fu_price',
            'contract_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
