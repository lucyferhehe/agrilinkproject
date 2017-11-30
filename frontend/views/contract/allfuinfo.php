

<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\utilities\UtilityUrl;
use yii\helpers\Url;

$uid = Yii::$app->user->getId();

use common\models\Products;
use yii\helpers\ArrayHelper;
?>
<div class="fu-product-info">
    <a href="javscript:void(0)">
        <img alt="" class="imgdrap"  data-fu="0" data-id="<?= $product->product_id ?>" src="<?= Url::base() ?>/images/<?= $product->hinhanh ?>" style="max-width: 60px">
        free<span class="free"> <?= $countFu ?></span>
    </a>
    <?php foreach ($fugr as $fu) { ?>

        <a href="<?= Url::to(['contract/fuprogress', 'fuid' => $fu->fu_id]) ?>">
            <img class="imgdrap progressing" alt=""data-fu="<?= $fu->fu_id ?>" data-id="<?= $product->product_id ?>" src="<?= Url::base() ?>/images/<?= $product->hinhanh ?>" style="max-width: 60px">
            <span><?= date('d/m/Y', $fu->date1) ?>-<?= date('d/m/Y', $fu->date2) ?>|<?= $fu->priceplus ?> đồng</span>

        </a>
    <?php } ?>



</div>

<script src="<?= Url::base() ?>/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?= Url::base() ?>/js/jquery-ui.js" type="text/javascript"></script>

<script>
    $('.imgdrap').draggable({
        containment: 'document',
        opacity: 0.8,
        revert: 'invalid',
        helper: function () {
            return $(this).clone().appendTo('body').show();
        },
        zIndex: 99,
    });
    $('.ruong').droppable({
        live: true,
        containment: 'document',
        accept: '.imgdrap',

        drop: function (ev, ui) {
            var dropitem = $(ui.draggable).clone().css({
                width: '100%', height: '100%',
            });

            if ($(this).hasClass('duocadd')) {
                if (!$(this).hasClass('added')) {
                    $(this).append(dropitem);
                    $(this).addClass("added");
                    if ($(ui.draggable).hasClass('progressing')) {
                        $(ui.draggable).closest('a').hide();
                    }
                } else {
                    $(this).children().remove();
                    $(this).append(dropitem);
                    if ($(ui.draggable).hasClass('progressing')) {
                        $(ui.draggable).closest('a').hide();
                    }
                }

            }

        }
    });


</script>