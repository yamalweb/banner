<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Редактирование слайдера: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';

?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <hr>
    <?= $this->render('_pics', [
        'modelPic' => $modelPic,
        'currentPics'=>$currentPics
    ]);
    ?>
</div>
