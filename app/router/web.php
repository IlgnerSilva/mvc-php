<?php

use App\Controllers\HomeController;
$app->get('/', HomeController::class.":index");

use App\useCase\autenticateUser\AuthenticateUserController;
$app->get('/login', AuthenticateUserController::class.":index");
$app->post('/login', AuthenticateUserController::class.":index");

use App\useCase\registerUser\RegisterUserController;
$app->get('/register', RegisterUserController::class.":index");
$app->post('/register', RegisterUserController::class.":index");