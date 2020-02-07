<?php

namespace yamalweb\banner\widgets;

use yii\helpers\Html;
/**
 * This is just an example.
 */
class BannerWidget extends \yii\base\Widget
{
    public $textHeader;
    public $message;
    public $textButton;
    public $urlButton;
    public $optionsButton;
    public $cookieEnabled;

    public function init()
    {
        parent::init();
        if ($this->textHeader === null) {
            $this->textHeader = 'Text Header';
        }
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
        if ($this->textButton === null) {
            $this->textButton = 'Не показывать';
        }
        if ($this->urlButton === null) {
            $this->urlButton = '';
        }
        if ($this->optionsButton === null) {
            $this->optionsButton = ['class'=>'btn-lg btn-primary', 'role'=>'button', 'style'=>'text-decoration: none;'];
        }
        if ($this->cookieEnabled === null) {
            $this->cookieEnabled = true;
        }

    }

    public function run()
    {
        $cookies = \Yii::$app->request->cookies;

        if($this->cookieEnabled){
            if (($cookie = $cookies->get('alreadySeen')) === null) {
                $cookiesResp = \Yii::$app->response->cookies;
                $cookiesResp->add(new \yii\web\Cookie([
                    'name' => 'alreadySeen',
                    'value' => 1,
                ]));
            }
        }

        if (!$cookies->has('alreadySeen') || $this->cookieEnabled === false){
            return $this->render('main',[
                'textHeader'=>$this->textHeader,
                'message'=>$this->message,
                'textButton'=>$this->textButton,
                'urlButton'=>$this->urlButton,
                'optionsButton'=>$this->optionsButton,
            ]);
        }

    }
}
