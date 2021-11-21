<?php
session_start();
include_once('../../../config/Note.php');

$noteClass = new Note();

$user_id = $_SESSION['id'];

$note_list = $noteClass->note_list($user_id);

$response_data = array();

if( mysqli_num_rows($note_list) > 0 ) {
    while ($line = mysqli_fetch_object($note_list)) {
        $data_line = new stdClass;
        $data_line->lecture_type = $line->lecture_type;
        $data_line->lecture_type_desc = $line->lecture_type_desc;
        $data_line->note = $line->note;
        array_push($response_data, $data_line);
    }
}

echo '{"data":'.json_encode($response_data).'}';

?>