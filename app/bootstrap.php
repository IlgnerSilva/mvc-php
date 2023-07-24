<?php 
require_once dirname(__DIR__) . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("RelativePath", __DIR__);
define("PathToCurrentPage", "/app/");
define("FileName", "bootstrap.php");
require_once RelativePath . "/config/Common.php";

use Slim\Factory\AppFactory;

$app = AppFactory::create();

require_once __DIR__ . "/router/web.php";

$app->run();

