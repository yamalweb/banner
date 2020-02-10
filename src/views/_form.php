<?php
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
?>

<div class="well">
    <?php $form = \yii\widgets\ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'button_text')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'button_url')->textInput() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <?=$form->field($model, 'text')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 'path' => 'banner/'],[/* Some CKEditor Options */]),
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1">
            <?= \yii\helpers\Html::img(Yii::$app->urlManagerFrontEnd->createUrl($model->getThumbUploadUrl('filename', 'thumb')), ['class' => 'img-thump', 'style' => 'width:90px;']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'filename')->fileInput(['accept' => 'image/*']) ?>

            <?= $model->filename ? 'Прикрепленный файл - ' . $model->filename : '' ?>
        </div>

    </div>
    <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['style'=>['margin-top'=>'25px'],'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php \yii\widgets\ActiveForm::end(); ?>
</div>
