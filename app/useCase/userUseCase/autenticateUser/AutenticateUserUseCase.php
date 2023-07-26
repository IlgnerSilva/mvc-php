<?php
    namespace App\useCase\autenticateUser;
    use App\classes\Query;
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    class AuthenticateUserUseCase {
        public function execute(string $email, string $password){
            $db = new Query;
            $userAlreadyExists = $db->dbFindFirst($email, "login_usuario", "usuarios");
            if(!$userAlreadyExists){
                throw new \ErrorException("User or password incorrect");
            }
            if(CCLoginUser($email, $password)){
                $payload = [
                    "exp" => time() + 10,
                    "iat" => time(),
                    "id" => CCGetSession("UserID_app"),
                    "userLogin" => CCGetSession("UserLogin_app"),
                    "IDGroup" => CCGetSession("GroupID_app")
                ];
                $encode = JWT::encode($payload, $_ENV["KEY"], "HS256");
                $decode = JWT::decode($encode, new Key($_ENV["KEY"], 'HS256'));
                print_r(json_encode(["encode"=>"Bearer $encode", "decode"=>$decode]));
                //var_dump($decode);
                die();
                return "Bearer $encode";
            }
            return false;
        }
    }
?>