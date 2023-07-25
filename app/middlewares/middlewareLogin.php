<?php
    //require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');

    function middlewareLogin(){
        $authorization = CCGetSession("authorization");
        $token = str_replace("Bearer", "", $authorization);

        $decode = JWT::decode($token, new Key($_SERVER['KEY'], 'HS256'));
        CCSetSession("TESTE", $decode);
        return $decode;
        
    }

?>