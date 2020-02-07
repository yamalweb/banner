<?php

namespace yamalweb\banner\models;

use mohorev\file\UploadImageBehavior;

/**
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            ['filename', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update'], 'skipOnEmpty' => !$this->isNewRecord],
            [['button_text','button_url'], 'string', 'max' => 255],
            ['description','string'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::className(),
                'attribute' => 'filename',
                'scenarios' => ['insert', 'update'],
                'placeholder' => '@frontend/web/img/image-placeholder.png',
                'path' => '@frontend/web/upload/banner',
                'url' => '@web/upload/banner',
                'thumbs' => [
                    'thumb' => ['width' => 90, 'height' => 60,'quality' => 60,'mode'=>'outbound'],
                    'full' => ['width' => 600, 'height' => 800,'quality' => 90,'mode'=>'outbound'],


                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title'=>'Заголовок слайда',
            'description'=>'Описание',
            'filename' => 'Файл',
            'button_text'=>'Текст кнопки',
            'button_url'=>'Ссылка кнопки',
        ];
    }


    /**
     * {@inheritdoc}
     * @return BannerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BannerQuery(get_called_class());
    }
}
