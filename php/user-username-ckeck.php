<?php
session_start();
include_once('../config/User.php');

$user = new User();

if(isset($_REQUEST['username'])){

    $username = $_REQUEST['username'];

    $checked_username = $user->check_userame($username);

    if($checked_username){
        echo 1;
    }
    else {
        echo 0;
    } 

}
?>