<?php
use yamalweb\banner\BannerAssetsBundle;
BannerAssetsBundle::register($this);
 ?>
<div id="banner" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?=\yii\helpers\Html::encode($textHeader)?></h4>
            </div>
            <div class="modal-body">
                <p><?=\yii\helpers\Html::encode($message)?></p>
            </div>
            <div class="modal-footer">
                <?=\yii\helpers\Html::a(\yii\helpers\Html::encode($textButton),$urlButton,$optionsButton)?>
            </div>
        </div>

    </div>
</div>