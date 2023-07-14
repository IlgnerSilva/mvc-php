<?php 
//error_reporting(0);
require_once dirname(__DIR__) . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require_once __DIR__ . "/classes/User.php";
require_once __DIR__ . "/classes/Query.php";
require_once __DIR__ . "/resources/main.php";