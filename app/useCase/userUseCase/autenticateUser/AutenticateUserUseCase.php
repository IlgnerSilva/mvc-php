<?php
    namespace App\useCase\autenticateUser;
    use App\classes\Query;
    use Firebase\JWT\JWT;
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
                return $encode;
            }
            throw new \ErrorException("User or password incorrect");
        }
    }
?>