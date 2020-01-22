<?php
use yamalweb\banner\BannerAssetsBundle;
BannerAssetsBundle::register($this);
?>
<?= BannerWidget::widget(['message' => 'Good morning']) ?>
