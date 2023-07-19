<?php 

require_once dirname(__DIR__) . "/vendor/autoload.php";
require_once __DIR__ . "/router/web.php";

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->run();