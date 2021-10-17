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
$pusher_channel = 'reminder-channel-'.$user_id;
$pusher_event = 'reminder-event-'.$user_id;

$pusher_reminder = $reminder->pusher_reminder($user_id);
$response = new stdClass;
if(mysqli_num_rows($pusher_reminder) > 0) {
    $response->result = true;
    $response->data = mysqli_fetch_object($pusher_reminder);
    $set_pusher_date = $reminder->set_pusher_date($response->data->id);
}
else {
    $response->result = false;
}

$pusher->trigger($pusher_channel, $pusher_event, $response);
// echo json_encode($response);

?>