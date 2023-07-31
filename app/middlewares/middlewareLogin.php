<?php
    //require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');

    function middlewareLogin(){
        if(!empty(CCGetSession("authorization"))){
            $authorization = CCGetSession("authorization");
            $token = str_replace("Bearer ", "", $authorization);
            $decode = JWT::decode($token, new Key($_ENV["KEY"], 'HS256'));
            header("Location: /");
            //return $decode;
        }
        header("Location: /login");
    }

?>