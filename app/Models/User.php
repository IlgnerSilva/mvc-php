<?php
    namespace App\Models;
    class User {
        private $fields;
        public function __construct(string $email, string $password, string $id_grupos){
            $this->fields = array(
                array(
                    "Name" => "login_usuario",
                    "Value" => "$email",
                    "DataType" => "ccsText"
                ),
                array(
                    "Name" => "login_senha",
                    "Value" => "$password",
                    "DataType" => "ccsText"
                ),
                array(
                    "Name" => "id_grupos",
                    "Value" => "$id_grupos",
                    "DataType" => "ccsText"
                )
            );
        }

        public function getFields():array{
            return $this->fields;
        }
    }
?>