<?php
session_start();
include_once('../../../config/Note.php');

$noteClass = new Note();

$user_id = $_SESSION['id'];
$lecture_type = $_REQUEST['lecture_type'];
$lecture_type_desc = $_REQUEST['lecture_type_desc'];
$note = $_REQUEST['note'];

$insert_note = $noteClass->insert_note($user_id,$lecture_type,$lecture_type_desc,$note);
$response = new stdClass;

if($insert_note){
    $response->result = true;
    $response->message = "note added successfull";
}
else {
    $response->result = false;
    $response->message = "note added not successfull";
}

echo json_encode($response);

?>