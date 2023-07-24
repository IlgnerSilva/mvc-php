<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Header;

class HomeController
{
    use \App\Support\Template;
    public function index(Request $request, Response $response, $args)
    {
        if(!(CCGetSession("UserLogin_app"))){
            Header("Location: /login");
        }else{
            return $this->render($response, "home", ["name" => "Eduardo", "year" => "24"]);
        }
    }
}
