<?php
define("RelativePath", dirname(__DIR__));
define("PathToCurrentPage", "/app/classes/");
define("FileName", "Query.php");
require_once RelativePath . "/config/Common.php";

class Query{
    private $db;
    private $sql;
    public function __construct(){
        $this->db = new clsDBapp();
    }

    protected function dbSelect(array $campos, $table): array{
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
    protected function dbInsert($table, $fields){
        $this->sql = CCBuildInsert($table, $fields, $this->db);
        $this->db->query($this->sql);
    }
}