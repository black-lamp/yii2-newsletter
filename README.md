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
"black-lamp/yii2-newsletter": "2.*.*"
```
to the require section of your composer.json.
#### Applying migrations
```
yii migrate --migrationPath=@vendor/black-lamp/yii2-newsletter/common/migrations
```
#### Add modules to application config
Frontend module for subscriptions
```php
'modules' => [
     // ...
     'newsletter' => [
         'class' => bl\newsletter\frontend\Newsletter::className()
     ],
]
```
Backend module for control of list of the clients
```php
'modules' => [
     // ...
     'newsletter' => [
         'class' => bl\newsletter\backend\Newsletter::className()
     ],
]
```
