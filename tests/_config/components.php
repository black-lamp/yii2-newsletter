<?php
return [
    'db' => require(__DIR__ . '/db.php'),

    'clientManager' => [
        'class' => \bl\newsletter\common\components\ClientManager::class
    ]
];