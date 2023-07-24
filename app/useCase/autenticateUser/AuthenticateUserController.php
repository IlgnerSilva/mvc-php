<?php

namespace App\useCase\autenticateUser;
require_once __DIR__ . "/AutenticateUserUseCase.php";
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthenticateUserController
{
    use \App\Support\Template;

    public function index(Request $request, Response $response, $args)
    {
        try {
            if (!$request->getParsedBody()["email"] && !$request->getParsedBody()["password"]) {
                return $this->render($response, "login");
            } else {
                $authenticateUserUseCase = new AuthenticateUserUseCase();
                $authenticateUserUseCase->execute($request->getParsedBody()["email"], md5($request->getParsedBody()["password"]));
                var_dump($authenticateUserUseCase);
                die();
                return $response->withStatus(200);
            }
        } catch (Exception $err) {
            CCSetSession("msgError",$err->getMessage());
            Header("Location: /login");
            die();
        }
    }
}
