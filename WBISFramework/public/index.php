<?php

use app\controllers\AuthController;
use app\controllers\HomeController;
use app\core\Application;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->ruter->get("/","home");
// $app->ruter->get("/index","index");
$app->ruter->get("/home",[HomeController::class,"dashboard"]); 
# 'app\controllers\HomeController' je ono sto HomeController::class sadrzi, tj. putanju ka HomeController klasi putem namespace-a
$app->ruter->get("/contact","contact");
$app->ruter->get("/login",[AuthController::class,'login']);
$app->ruter->get("/register",[AuthController::class,'register']);

$app->run();

?>