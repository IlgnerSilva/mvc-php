<?php
define("RelativePath", dirname(__DIR__));
define("PathToCurrentPage", "/app/classes/");
define("FileName", "User.php");
require_once RelativePath . "/config/Common.php";
class User{
    private $db;
    private $sql;
    public function __construct(){
        $this->db = new clsDBapp();
    }
    public function addUser($nome, $email){
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

        //return CCBuildInsert("teste", $fields, $this->db);
        $this->sql = CCBuildInsert("teste", $fields, $this->db);
        $this->db->query($this->sql);
    }
    public function getUsers(){
        
    }
}
