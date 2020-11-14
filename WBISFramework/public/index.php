<?php

use app\controllers\HomeController;
use app\core\Application;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->ruter->get("/","home");
// $app->ruter->get("/index","index");
$app->ruter->get("/home",[HomeController::class,"dashboard"]);
$app->ruter->get("/contact","contact");

$app->run();

?>