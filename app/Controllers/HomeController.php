<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController{
    use \App\Support\Template;
    public function index(Request $request, Response $response, $args){
        return $this->render($response, "home", ["name"=>"Eduardo", "year"=>"24"]);
    }
}