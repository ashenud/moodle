<?php

require_once 'Database.php';

class StudyPlan extends DB {

    public function __construct() {
        parent::__construct();
    }

    public function get_study_plan($user_id) {
        $plan_id = $this->get_latest_plan($user_id);
        $sql = "SELECT * FROM tbl_study_plans WHERE plan_id = '$plan_id' AND deleted_at is null";
        $query = $this->connection->query($sql); 
        return $query;
    }

    protected function get_latest_plan($user_id) {
        $sql = "SELECT * FROM tbl_user_study_plans WHERE user_id = '$user_id' AND deleted_at is null ORDER BY created_at DESC LIMIT 1";
        $query = $this->connection->query($sql);
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['plan_id'];
        }
        else{
            return 0;
        }
    }

    public function insert_study_plan($user_id,$plan_id) {
        $all_query = true;
        $this->connection->autocommit(FALSE);
        
        $sql = "INSERT INTO tbl_user_study_plans (user_id,plan_id) VALUES ('".$user_id."','".$plan_id."')";
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