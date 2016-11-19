Newsletter module for Yii2
==========================
Module for subscribe on newsletter by e-mail or phone number

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
