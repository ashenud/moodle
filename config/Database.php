<?php
session_start();

class DB {

    private $db_name="db_moodle";
    private $db_user="root";
    private $db_pass="";
    private $db_host="localhost";
    
    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

        if(!isset($this->connection)) {
            $_SESSION["error_flash"] = "Connection failed";
            die();
        }
        else {
            return $this->connection;
        }
    }

}



?>