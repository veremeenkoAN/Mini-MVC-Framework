<?php

require_once __DIR__ . '/configphp/constdir.php';
require_once __DIR__ . '/configphp/dbconfig.php';

require_once APP_ROOT . '/vendor/autoload.php';
require_once HELPERS . '/helpers.php';

use Core\Application;

$app = new Application();
require_once HELPERS . '/routes.php';
$app->run();




