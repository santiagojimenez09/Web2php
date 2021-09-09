<?php
class Account{
    private $db;
    private $db_table= "cuentas";

    public $nrocuenta;
    public $cedula;
    public $fecha_apertura;
    public $saldo;

    public $result;


    public function __construct($db){
        $this->db=$db;
    }

    function getAccounts(){
        $sqlquery = "SELECT nrocuenta, cedula, fecha_apertura, saldo FROM ".$this->db_table."";
        $this->result = $this->db->query($sqlquery);
        return $this->result;
    }







    }