<?php

require_once 'Database.php';

class Note extends DB {

    public function __construct() {
        parent::__construct();
    }

    public function note_list($user_id) {
        $sql = "SELECT * FROM tbl_notes WHERE user_id = '$user_id' AND deleted_at is null";
        $query = $this->connection->query($sql); 
        return $query;
    }

    public function insert_note($user_id,$lecture_type,$lecture_type_desc,$note) {
        $all_query = true;
        $this->connection->autocommit(FALSE);
        
        $sql = "INSERT INTO tbl_notes (user_id,lecture_type,lecture_type_desc,note) VALUES ('".$user_id."','".$lecture_type."','".$lecture_type_desc."','".$note."')";
        $this->connection->query($sql) ? null : $all_query = false;

        if($all_query) {
            $this->connection->commit();
            return true;
        }
        else {
            $this->connection->rollback();
            return false;
        }
    }

}






?>