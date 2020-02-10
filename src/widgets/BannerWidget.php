<?php

namespace yamalweb\banner\widgets;

use yamalweb\banner\models\Banner;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\NotFoundHttpException;

/**
 * This is just an example.
 */
class BannerWidget extends \yii\base\Widget
{
    public $id;
    public $model;
    public $textHeader;
    public $message;
    public $textButton;
    public $urlButton;
    public $img;
    public $optionsButton;
    public $cookieEnabled;

    public function init()
    {
        parent::init();

        $model = Banner::find()
            ->where(['id' => $this->id])
            ->one();

        if ($model !== null) {

            $this->textHeader = HtmlPurifier::process($model->title, function ($config) {
                $config->getHTMLDefinition(true)
                    ->addAttribute('img', 'data-type', 'Text');
            });

            $this->message = $model->text;

            $this->img =  $model->getThumbUploadUrl('filename', 'full');

            $this->textButton = $model->button_text;
            $this->urlButton = $model->button_url;

            if ($this->optionsButton === null) {
                $this->optionsButton = ['class' => 'btn-lg btn-primary', 'role' => 'button', 'style' => 'text-decoration: none;'];
            }
            if ($this->cookieEnabled === null) {
                $this->cookieEnabled = true;
            }
        } else {

            throw new NotFoundHttpException('Баннер с таким ID не найден!');

        }

    }

    public function run()
    {
        $cookies = \Yii::$app->request->cookies;

        if ($this->cookieEnabled) {
            if (($cookie = $cookies->get('alreadySeen')) === null) {
                $cookiesResp = \Yii::$app->response->cookies;
                $cookiesResp->add(new \yii\web\Cookie([
                    'name' => 'alreadySeen',
                    'value' => 1,
                ]));
            }
        }

        if (!$cookies->has('alreadySeen') || $this->cookieEnabled === false) {
            return $this->render('main', [
                'textHeader' => $this->textHeader,
                'message' => $this->message,
                'textButton' => $this->textButton,
                'urlButton' => $this->urlButton,
                'img'=>$this->img,
                'optionsButton' => $this->optionsButton,
            ]);
        }

    }
}
