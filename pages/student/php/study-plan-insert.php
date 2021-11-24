<?php
session_start();
include_once('../../../config/StudyPlan.php');

$studyPlanClass = new StudyPlan();

$user_id = $_SESSION['id'];
$plan_id = $_REQUEST['plan_id'];

$insert_plan = $studyPlanClass->insert_study_plan($user_id,$plan_id);
$response = new stdClass;

if($insert_plan){
    $response->result = true;
    $response->message = "note added successfull";
}
else {
    $response->result = false;
    $response->message = "note added not successfull";
}

echo json_encode($response);

?>