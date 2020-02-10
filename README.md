Banner
======
Widget popup-banner

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yamalweb/banner "*"
```

or add

```
"yamalweb/banner": "*"
```

to the require section of your `composer.json` file.

php yii migrate --migrationPath="@yamalweb/banner/migrations"

'controllerMap' => [
        'banner' => [
            'class' => 'yamalweb\banner\controllers\BannerController',
            'viewPath' => '@yamalweb/banner/views',
        ]
    ],
    
    
    
    or
    
    'banner' => [
                'class' => 'yamalweb\banner\Module',
                'controllerNamespace' => 'yamalweb\banner\controllers',
                'viewPath' => '@yamalweb/banner/views',
            ],
Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \yamalweb\banner\widgets\BannerWidget::widget([
            'id'=>2,
            'cookieEnabled'=>false
        ]) ?>