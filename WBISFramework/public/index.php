<?php

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\UserController;
use app\controllers\ProductController;
use app\controllers\ShoppingCartController;
use app\controllers\AdministrationController;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->ruter->get("/",[HomeController::class,"dashboard"]);
$app->ruter->get("/index",[HomeController::class,"dashboard"]);
$app->ruter->get("/home",[HomeController::class,"dashboard"]); 
$app->ruter->get("/login",[AuthController::class,'login']);
$app->ruter->get("/register",[AuthController::class,'register']);
$app->ruter->get("/shoppingCart",[ShoppingCartController::class,'cart']); 
$app->ruter->get("/profile",[UserController::class, 'profile']); 
$app->ruter->get("/products",[ProductController::class, 'products']); 
$app->ruter->get("/adminPanel",[AdministrationController::class, 'adminPanel']); 
$app->ruter->get("/reports",[AdministrationController::class, 'reports']); 
$app->ruter->get("/productsJSON",[ProductController::class, 'productsJSON']); 
$app->ruter->get("/productDetails",[ProductController::class, 'productDetails']);
$app->ruter->get("/deleteCart",[ShoppingCartController::class,'deleteCart']);
$app->ruter->get("/checkout",[ShoppingCartController::class,'checkout']);
$app->ruter->get("/productDetailsJSON",[ProductController::class, 'productDetailsJSON']);
$app->ruter->get("/logout", [AuthController::class, 'logout']);
$app->ruter->get("/codesPerMonthSold", [ProductController::class, 'codesPerMonthSold']);
$app->ruter->get("/codesPerMonthPerTagSold", [ProductController::class, 'codesPerMonthPerTagSold']);
$app->ruter->post("/loginProcess",[AuthController::class,'loginProcess']);
$app->ruter->post("/registerProcess",[AuthController::class,'registerProcess']);
$app->ruter->post("/addToCart",[ShoppingCartController::class,'addToCart']);
$app->ruter->post("/uploadCodeProcess",[UserController::class,'uploadCodeProcess']);
$app->ruter->post("/profileUpdateProcess",[UserController::class,'profileUpdateProcess']);
$app->ruter->post("/makeNews",[AdministrationController::class,'makeNews']);


$app->run();

?>