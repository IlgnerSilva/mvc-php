<?php
    namespace App\useCase\userUseCase\registerUser;
    use App\classes\Query;
    use App\Models\User;
    class RegisterUserUseCase{
        public function execute(string $email, string $password){
            $db = new Query;
            $userAlreadyExists = $db->dbFindFirst($email, "login_usuario", "usuarios");
            if($userAlreadyExists){
                throw new \ErrorException("Email já cadastrado.");
            }

            $user = new User($email, $password, "20");
            $db->dbInsert("usuarios", $user->getFields());
        }
    }
?>