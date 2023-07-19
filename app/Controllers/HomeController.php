<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController{
    public function run(Response $response, Request $request, $args){
        $response->getBody()->write("Home constroller");
        return $response;
    }
}