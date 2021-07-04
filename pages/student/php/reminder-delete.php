<?php
session_start();
include_once('../../../config/Reminder.php');

$reminder = new Reminder();

if(isset($_REQUEST['reminder_id'])){

    $reminder_id = $_REQUEST['reminder_id'];

    $detete_reminder = $reminder->detete_reminder($reminder_id);
    $response = new stdClass;

    if($detete_reminder){
        $response->result = true;
        $response->message = "Reminder deleted successfull";
    }
    else {
        $response->result = false;
        $response->message = "Reminder deleted not successfull";
    } 
    
    echo json_encode($response);

}
?>