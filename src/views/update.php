<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Редактирование баннера: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';

?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
