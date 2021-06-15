<?php

require_once 'Database.php';

class User extends DB {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($username,$password) {
        $pwd = md5($password);
        $sql = "SELECT * FROM tbl_user u WHERE u.u_username = '$username' AND u.u_password = '$pwd' and u.deleted_at is null LIMIT 1";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row;
        }
        else{
            return false;
        }
    }

    public function escape_string($value){ 
        return $this->connection->real_escape_string($value);
    }

    public function register_user($u_name,$email,$password){
        $sql = "INSERT INTO `mm_user`(`u_name`, `username`, `password`) VALUES ('".$u_name."','".$email."','".$password."')";
        $query = $this->connection->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function check_userame($username){
        
        $sql = "SELECT * FROM tbl_user u WHERE u.u_username = '$username'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            return true;
        }
        else{
            return false;
        }    
    
    }

}






?>