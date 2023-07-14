<?php
require_once "Query.php";
class User extends Query{
    private $query;
    public function __construct(){
        // $this->query = new Query();
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
        $this->dbInsert($table, $fields);
    }
    public function getUsers(array $campos, string $table): array{
        return $this->dbSelect($campos, $table);
    }
    
}
