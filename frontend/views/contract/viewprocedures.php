<?php

use yii\helpers\Url;
?>                    

<?php
if(count($procedures)>0){
foreach ($procedures as $pr) {
    ?>
    <div>
        <a class="thumbnail" style="border-left-color:#00cc33; "href="javascript:void(0)"data-toggle="tooltip" data-placement="top" title="<?= $pr->procedure_name ?>"><img  draggable="true" alt="" data-id="" src="<?= Url::base() ?>/images/<?= $pr->image ?>"></a>
    </div>   
    <?php
}}
?>
<script>
    
</script>