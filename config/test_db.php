<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host='.getenv('DB_HOST').';dbname=yii2_basic_tests';

return $db;
