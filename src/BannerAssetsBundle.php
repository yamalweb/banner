<?php
namespace yamalweb\banner;
use yii\web\AssetBundle;
class BannerAssetsBundle extends AssetBundle
{
    public $sourcePath = '@vendor/yamalweb/banner/assets';
    public $css = [
        'css/style.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}