<?php

namespace App\useCase\registerUser;
require_once __DIR__ . "/RegisterUserUseCase.php";

use ErrorException;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Header;

class RegisterUserController
{
    use \App\Support\Template;

    public function index(Request $request, Response $response, $args)
    {
        try {
            if (!$request->getParsedBody()["email"] && !$request->getParsedBody()["password"]) {
                throw new ErrorException("Preencha todos os campos.");
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
