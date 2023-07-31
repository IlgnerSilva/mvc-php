<?php

namespace App\useCase\userUseCase\autenticateUser;
require_once __DIR__ . "/AutenticateUserUseCase.php";
use App\useCase\autenticateUser\AuthenticateUserUseCase;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthenticateUserController
{
    use \App\Support\Template;

    public function index(Request $request, Response $response, $args)
    {
        var_dump($_SESSION);
        try {
            if (!$request->getParsedBody()["email"] || !$request->getParsedBody()["password"]) {
                return $this->render($response, "login");
            } else {
                $authenticateUserUseCase = new AuthenticateUserUseCase();
                $logado = $authenticateUserUseCase->execute($request->getParsedBody()["email"], $request->getParsedBody()["password"]);
                if($logado){
                    CCSetSession("authorization", "$logado");
                    Header("Location: /");
                    die();
                }
                throw new \ErrorException("User or password invalid.");
            }
        } catch (Exception $err) {
            CCSetSession("msgError",$err->getMessage());
            Header("Location: /login");
            die();
        }
    }
}
