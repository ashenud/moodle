<?php

session_start();
include_once('../../../config/Reminder.php');

$reminder = new Reminder();

$reminder_list = $reminder->reminder_list($_SESSION['id']);
$reminder_data = array();

if( mysqli_num_rows($reminder_list) > 0 ) {
    while ($rem = mysqli_fetch_object($reminder_list)) {
        $reminder_line = new stdClass;
        $reminder_line->reminder = $rem->reminder;
        $reminder_line->date = $rem->date;
        $reminder_line->action = "<button class='btn' id='del_rem_btn' onclick='delete_reminder($rem->id)'> <i class='fas fa-trash-alt'></i> </button>";
        array_push($reminder_data, $reminder_line);
    }
}

echo '{"data":'.json_encode($reminder_data).'}';

?>