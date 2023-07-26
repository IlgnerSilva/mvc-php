<?php
    //require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');

    function middlewareLogin(){
        $authorization = CCGetSession("authorization");
        $token = str_replace("Bearer ", "", $authorization);
        $decode = JWT::decode($authorization, new Key($_ENV["KEY"], 'HS256'));
        var_dump($_ENV['KEY']);
        var_dump($token);
        die();
        //CCSetSession("TESTE", $decode);
        return $decode;
    }

?>