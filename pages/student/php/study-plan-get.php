<?php
session_start();
include_once('../../../config/StudyPlan.php');

$studyPlanClass = new StudyPlan();

$user_id = $_SESSION['id'];

$study_plan = $studyPlanClass->get_study_plan($user_id);

$response_data = array();

if( mysqli_num_rows($study_plan) > 0 ) {
    while ($line = mysqli_fetch_object($study_plan)) {
        $data_line = new stdClass;
        $data_line->time = $line->time;
        $data_line->description = $line->description;
        array_push($response_data, $data_line);
    }
}

echo '{"data":'.json_encode($response_data).'}';

?>