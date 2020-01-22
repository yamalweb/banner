<?php

namespace yamalweb\banner\widgets;

use yii\helpers\Html;

/**
 * This is just an example.
 */
class BannerWidget extends \yii\base\Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}
