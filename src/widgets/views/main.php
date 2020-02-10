<?php
use yamalweb\banner\BannerAssetsBundle;
use yii\helpers\Html;

BannerAssetsBundle::register($this);
 ?>
<div id="banner" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?=\yii\helpers\Html::encode($textHeader)?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">
                        <?= Html::img($img, ['class' => 'img-thumbnail']);?>
                    </div>
                    <div class="col-lg-7">
                        <?=$message?>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <?=\yii\helpers\Html::a(\yii\helpers\Html::encode($textButton),$urlButton,$optionsButton)?>
            </div>
        </div>

    </div>
</div>