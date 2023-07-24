<?php
namespace App\classes;

define("RelativePath", dirname(__DIR__));
define("PathToCurrentPage", "/app/classes/");
define("FileName", "Query.php");
require_once RelativePath . "/config/Common.php";

class Query{
    private $db;
    private $sql;
    public function __construct(){
        $this->db = new \clsDBapp();
    }

    public function dbFindAll(array $campos, $table): array{
        $this->sql = CCBuildSQL("SELECT ".implode(", ",$campos)." FROM $table");
        $this->db->query($this->sql);
        $retorno = array();
        while($this->db->next_record()){
            $dados = array();
            foreach($campos as $values){
                $dados[] = $this->db->f($values);
            }
            $retorno[] = $dados;
        }
        return $retorno;
    }
    public function dbFindFirst(string $value, string $field, string $table){
        $this->sql = CCBuildSQL("SELECT $field FROM $table WHERE $field = '$value'");
        var_dump($this->sql);
        var_dump(CCGetDBValue($this->sql, $this->db));
        die();
        return CCGetDBValue($this->sql, $this->db);
    }
    public function dbInsert(string $table, array $fields){
        $this->sql = CCBuildInsert($table, $fields, $this->db);
        return $this->db->query($this->sql);
    }
}