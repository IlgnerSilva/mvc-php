<?php

namespace App\Support;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface as Response;
trait Template{
    private $template;

    private function load(){
        $this->template = new Engine(dirname(__DIR__) . "/view");
        return $this->template;
    }

    public function render(Response $response, $name, $paraments = []){
        $response->getBody()->write($this->fetch($name, $paraments));
        return $response;
    }

    private function fetch($name, $paraments){
        return $this->load()->render($name, $paraments);
    }
}