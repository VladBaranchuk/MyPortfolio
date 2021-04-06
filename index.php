<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT . '\application\core\router.php'); // Подключение роутера
require_once(ROOT . '\application\components\db.php'); // Подключение информации о базе данных



$router = new Router();
$router->run();


?>
