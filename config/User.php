<?php

require_once 'Database.php';

class User extends DB {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($username,$password) {
        $pwd = md5($password);
        $sql = "SELECT * FROM tbl_users u WHERE u.username = '$username' AND u.password = '$pwd' and u.deleted_at is null LIMIT 1";
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

    public function register_student($first_name,$last_name,$dob,$gender,$mobile,$email,$address,$username,$password,$al_stream,$uni_stream,$ol_eng_result,$al_eng_result){
        
        $grade_point = 1.1000;

        if(($ol_eng_result == 1 || $ol_eng_result == 2) && ($al_eng_result == 1 || $al_eng_result == 2)) {
            $grade_point = 2.0000;
        }

        $all_query = true;
        $this->connection->autocommit(FALSE);
        
        $sql1 = "INSERT INTO tbl_users (first_name, last_name, gender, email, type_id, address, username, password	) VALUES ('".$first_name."','".$last_name."','".$gender."','".$email."','2','".$address."','".$username."','".$password."')";
        $this->connection->query($sql1) ? null : $all_query = false;
        
        $user_id = $this->connection->insert_id;
        $sql2 = "INSERT INTO tbl_students (user_id, first_name, last_name, dob, gender, mobile, email, address, al_stream, uni_stream, ol_eng_result, al_eng_result, grade_point) VALUES ('".$user_id."','".$first_name."','".$last_name."','".$dob."','".$gender."','".$mobile."','".$email."','".$address."','".$al_stream."','".$uni_stream."','".$ol_eng_result."','".$al_eng_result."','".$grade_point."')";
        $this->connection->query($sql2) ? null : $all_query = false;

        if($all_query) {
            $this->connection->commit();
            return true;
        }
        else {
            $this->connection->rollback();
            return false;
        }
                    
    }

    public function register_lecturer($first_name,$last_name,$dob,$gender,$mobile,$email,$address,$username,$password,$specialized,$university){

        $all_query = true;
        $this->connection->autocommit(FALSE);

        $sql1 = "INSERT INTO tbl_users (first_name, last_name, gender, email, type_id, address, username, password	) VALUES ('".$first_name."','".$last_name."','".$gender."','".$email."','1','".$address."','".$username."','".$password."')";
        $this->connection->query($sql1) ? null : $all_query = false;
        
        $user_id = $this->connection->insert_id;
        $sql2 = "INSERT INTO tbl_lecturers (user_id, first_name, last_name, dob, gender, mobile, email, address, specialized, university ) VALUES ('".$user_id."','".$first_name."','".$last_name."','".$dob."','".$gender."','".$mobile."','".$email."','".$address."','".$specialized."','".$university."')";
        $this->connection->query($sql2) ? null : $all_query = false;

        if($all_query) {
            $this->connection->commit();
            return true;
        }
        else {
            $this->connection->rollback();
            return false;
        }  

    }

    public function check_userame($username){
        
        $sql = "SELECT * FROM tbl_users u WHERE u.username = '$username'";
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