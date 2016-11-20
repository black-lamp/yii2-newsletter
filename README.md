Newsletter module for Yii2
==========================
Module for subscribe on newsletter by e-mail or phone number

[![Latest Stable Version](https://poser.pugx.org/black-lamp/yii2-newsletter/v/stable)](https://packagist.org/packages/black-lamp/yii2-newsletter)
[![Latest Unstable Version](https://poser.pugx.org/black-lamp/yii2-newsletter/v/unstable)](https://packagist.org/packages/black-lamp/yii2-newsletter)
[![License](https://poser.pugx.org/black-lamp/yii2-newsletter/license)](https://packagist.org/packages/black-lamp/yii2-newsletter)

Installation
------------
#### Run command
```
composer require black-lamp/yii2-newsletter
```
or add
```json
"black-lamp/yii2-newsletter": "1.*.*"
```
to the require section of your composer.json.
#### Applying migrations
```
yii migrate --migrationPath=@vendor/black-lamp/yii2-newsletter/migrations
```
#### Add module to application config
```php
'modules' => [
     // ...
     'newsletter' => [
         'class' => bl\newsletter\Newsletter::className()
     ]
]
```
