<?php

use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\ShoppingCartController;
use app\core\Application;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->ruter->get("/",[HomeController::class,"dashboard"]);
$app->ruter->get("/index",[HomeController::class,"dashboard"]);
$app->ruter->get("/home",[HomeController::class,"dashboard"]); 
# 'app\controllers\HomeController' je ono sto HomeController::class sadrzi, tj. putanju ka HomeController klasi putem namespace-a
$app->ruter->get("/login",[AuthController::class,'login']);
$app->ruter->get("/register",[AuthController::class,'register']);
$app->ruter->get("/shoppingCart",[ShoppingCartController::class,'cart']); 
$app->ruter->get("/products",[ProductController::class, 'products']); 
$app->ruter->get("/productDetails","productDetails"); #TODO: figure out what to do with this
$app->ruter->get("/logout", [AuthController::class, 'logout']);
$app->ruter->post("/loginProcess",[AuthController::class,'loginProcess']);
$app->ruter->post("/registerProcess",[AuthController::class,'registerProcess']);

$app->run();

?>