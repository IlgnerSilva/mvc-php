<?php
 namespace App\classes;
class User{
    private $db;
    public function __construct(){
        $this->db = new Query();
    }
    public function addUser($table, $nome, $email){
        $fields = array(
            array(
                "Name" => "nome",
                "Value" => "$nome",
                "DataType" => "ccsText"
            ),
            array(
                "Name" => "email",
                "Value" => "$email",
                "DataType" => "ccsText"
            )
        );
        $this->db->dbInsert($table, $fields);
    }
    public function getUsers(array $campos, string $table): array{
        return $this->db->dbFindAll($campos, $table);
    }
    
}
