<?php
class Customer{
    private $db;
    private $db_table= "clientes";

    public $id;
    public $cedula;
    public $nombres;
    public $telefonos;

    public $result;


    public function __construct($db){
        $this->db=$db;


    }

    function getCustomers(){
        $sqlquery = "SELECT id, cedula, nombres, telefonos FROM ".$this->db_table."";
        $this->result = $this->db->query($sqlquery);
        return $this->result;
    }
    

    function getCustomersID(){
        $sqlquery = "SELECT id, cedula, nombres, telefonos FROM ".$this->db_table." WHERE id = ".$this->id;
        $registration = $this->db->query($sqlquery);
        $datarow = $registration->fetch_assoc();
        if($registration->num_rows > 0){
            $this->cedula = $datarow['cedula'];
            $this->nombres = $datarow['nombres'];
            $this->telefonos = $datarow['telefonos'];
        }
        else{
            $this->cedula = "";
        }
    }

    function addCustomer(){
        $sqlquery = "INSERT INTO ".$this->db_table." (cedula, nombres, telefonos) VALUES('$this->cedula','$this->nombres','$this->telefonos')";
        $this->db->query($sqlquery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function updateCustomer(){
        $sqlquery = "UPDATE " .$this->db_table." SET cedula = '" .$this->cedula. "',
        nombres = '" .$this->nombres. "',
        telefonos = '" .$this->telefonos. "'
        WHERE id = " .$this->id;
        $this->db->query($sqlquery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function deleteCustomer(){
        $sqlquery = "DELETE FROM " . $this->db_table . " WHERE cedula = " . $this->cedula;
        $this->db->query($sqlquery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }




}