<?php

namespace App\useCase\userUseCase\registerUser;
require_once __DIR__ . "/RegisterUserUseCase.php";

use App\useCase\userUseCase\registerUser\RegisterUserUseCase;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterUserController
{
    use \App\Support\Template;

    public function index(Request $request, Response $response, $args)
    {
        try {
            if (!$request->getParsedBody()["email"] && !$request->getParsedBody()["password"]) {
                return $this->render($response, "register");
            }
            $registerUserUseCase = new RegisterUserUseCase();
            $registerUserUseCase->execute($request->getParsedBody()["email"], md5($request->getParsedBody()["password"]));
            if($registerUserUseCase){
                CCSetSession("msgSucesso", "Usuário Cadastrado com sucesso!");
                Header("Location: /login");
            }
        } catch (Exception $err) {
            CCSetSession("msgError", $err->getMessage());
            return $this->render($response, "register");
        }
    }
}
