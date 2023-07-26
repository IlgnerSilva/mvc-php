<?php

require dirname(__DIR__) . "/middlewares/middlewareLogin.php";

use App\Controllers\HomeController;
$app->get('/', HomeController::class.":index")->add("middlewareLogin");

use App\useCase\userUseCase\autenticateUser\AuthenticateUserController;
$app->get('/login', AuthenticateUserController::class.":index");
$app->post('/login', AuthenticateUserController::class.":index");

use App\useCase\userUseCase\registerUser\RegisterUserController;
$app->get('/register', RegisterUserController::class.":index");
$app->post('/register', RegisterUserController::class.":index");

//Logout
$app->get('/logout', function(){
    CCLogoutUser();
    Header("Location: /login");
});