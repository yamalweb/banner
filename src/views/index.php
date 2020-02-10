<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Баннеры';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'id',
                'contentOptions' =>['style'=>'vertical-align:middle;']
            ],
            [
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img(Yii::$app->urlManagerFrontEnd->createUrl($model->getThumbUploadUrl('filename', 'thumb')), ['class' => 'img-thumbnail']);
                },
                'contentOptions' => ['style' => 'vertical-align:middle;'],
                'options' => ['style' => ['width' => '10%']],
            ],
            [
                'attribute'=>'title',
                'format'=>'raw',
                'value' => function ($model) {
                    return Html::a(\yii\helpers\StringHelper::truncate($model->title, 70),['/banner/update','id'=>$model->id]);
                },
                'contentOptions' =>['style'=>'vertical-align:middle;']
            ],

            [
                'format' => 'raw',
                'value'=>function($model) {
                        return Html::img($model->getThumbUploadUrl('filename', 'thumb'), ['class' => 'img-thumbnail']);
                },
                'contentOptions' =>['style'=>'vertical-align:middle;']
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'contentOptions' =>['style'=>'vertical-align:middle;']
            ],
        ],
    ]); ?>
</div>
