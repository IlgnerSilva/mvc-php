<?php
    namespace App\useCase\autenticateUser;
    use App\classes\Query;
    class AuthenticateUserUseCase {
        public function execute(string $email, string $password){
            $db = new Query;
            $userAlreadyExists = $db->dbFindFirst($email, "login_usuario", "usuarios");
            var_dump($userAlreadyExists);
            die();
            if(!$userAlreadyExists){
                throw new \ErrorException("User or password incorrect");
            }

            return CCLoginUser($email, $password);
        }
    }
?>