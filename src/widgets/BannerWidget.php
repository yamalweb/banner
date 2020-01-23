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
    }

    public function run()
    {
        return $this->render('main',[
            'textHeader'=>$this->textHeader,
            'message'=>$this->message,
            'textButton'=>$this->textButton,
            'urlButton'=>$this->urlButton,
            'optionsButton'=>$this->optionsButton
        ]);
    }
}
