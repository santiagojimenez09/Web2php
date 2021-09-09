<?php
class Database{
    public $db;
    public function getConnection(){
        $this->db=null;
        try{
            $this->db = new mysqli('localhost','root','','dbbank');
        }
        catch (Exception $e){
            echo "No se puede acceder a la base de datos".$e->getMessage();
        }
        return $this->db;
    }
}