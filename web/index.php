<?php

// comment out the following two lines when deployed to production

require __DIR__ . '/../vendor/autoload.php';

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

(Dotenv\Dotenv::create(__DIR__ . '/../'))->load();

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
