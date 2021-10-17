<?php

require_once 'Database.php';

class Reminder extends DB {

    public function __construct() {
        parent::__construct();
    }

    public function reminder_list($user_id) {
        $sql = "SELECT * FROM tbl_reminders tr WHERE tr.user_id = '$user_id' AND tr.deleted_at is null";
        $query = $this->connection->query($sql); 
        return $query;
    }

    public function insert_reminder($user_id,$reminder_desc,$reminder_datetime) {
        $all_query = true;
        $this->connection->autocommit(FALSE);
        
        $sql = "INSERT INTO tbl_reminders (user_id, reminder, date) VALUES ('".$user_id."','".$reminder_desc."','".$reminder_datetime."')";
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

    public function detete_reminder($reminder_id) {
        $all_query = true;
        $this->connection->autocommit(FALSE);

        $sql = "UPDATE tbl_reminders SET deleted_at=CURRENT_TIMESTAMP() WHERE id='$reminder_id'";
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

    public function escape_string($value){ 
        return $this->connection->real_escape_string($value);
    }    

    public function pusher_reminder($user_id) {
        $sql = "SELECT 
                    * 
                FROM 
                    tbl_reminders tr 
                WHERE 
                    tr.user_id = '$user_id' 
                    AND tr.deleted_at is null
                    AND DATE(tr.date) >= CURDATE()
                    AND DATE(tr.pusher_date) < CURDATE()
                ORDER BY
                    tr.date ASC
                LIMIT 1";
        $query = $this->connection->query($sql); 
        return $query;
    }  

    public function set_pusher_date($reminder_id) {
        $all_query = true;
        $this->connection->autocommit(FALSE);

        $sql = "UPDATE tbl_reminders SET pusher_date=CURRENT_TIMESTAMP() WHERE id='$reminder_id'";
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