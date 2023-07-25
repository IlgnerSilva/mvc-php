<?php

require_once dirname(__DIR__) . "/middlewares/middlewareLogin.php";

use App\Controllers\HomeController;
$app->get('/', middlewareLogin(), HomeController::class.":index");

use App\useCase\userUseCase\autenticateUser\AuthenticateUserController;
$app->get('/login', AuthenticateUserController::class.":index");
$app->post('/login', AuthenticateUserController::class.":index");

use App\useCase\userUseCase\registerUser\RegisterUserController;
$app->get('/register', RegisterUserController::class.":index");
$app->post('/register', RegisterUserController::class.":index");

//Logout
$app->get('/logout', function(){
    CCLogoutUser();
    Header("Location: /");
});