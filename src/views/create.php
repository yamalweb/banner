<?php

use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = 'Добавление баннера';
$this->params['breadcrumbs'][] = ['label' => 'Баннер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
