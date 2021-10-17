<?php
session_start();
include_once('../../../config/Reminder.php');
require __DIR__ . '/../../../vendor/autoload.php';

$options = array(
    'cluster' => 'ap2',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    '507c54b83ec6bd6c7965',
    '20e9e2c3273e65381b2d',
    '1229419',
    $options
);

$reminder = new Reminder();

$user_id = $_SESSION['id'];
$reminder_desc = $_REQUEST['reminder'];
$reminder_datetime = $_REQUEST['dateTime'];

$insert_reminder = $reminder->insert_reminder($user_id,$reminder_desc,$reminder_datetime);
$response = new stdClass;

if($insert_reminder){
    $response->result = true;
    $response->message = "Reminder added successfull";
}
else {
    $response->result = false;
    $response->message = "Reminder added not successfull";
} 

echo json_encode($response);

?>