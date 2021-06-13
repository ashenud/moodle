<?php
session_start();

include_once('../config/User.php');

$user = new User();

if(isset($_POST['login'])) {
    $username = $user->escape_string($_POST['username']);
    $password = $user->escape_string($_POST['password']);

    $auth = $user->check_login($username,$password);

    if(!$auth){        
        $_SESSION['flash_type'] = "error";
        $_SESSION['flash_message'] = "INVALID USERNAME OR PASSWORD";

        header('Location: /');
    }
    else{
        $_SESSION['u_id'] = $auth['u_id'];
        $_SESSION['u_type_id'] = $auth['u_type_id'];
        $_SESSION['u_first_name'] = $auth['u_first_name'];
        $_SESSION['u_last_name'] = $auth['u_last_name'];
        $_SESSION['u_name'] =  $auth['u_first_name']." ".$auth['u_last_name'];
        $_SESSION['u_address'] = $auth['u_address'];
        $_SESSION['u_email'] = $auth['u_email'];
        $_SESSION['u_age'] = $auth['u_age'];
        $_SESSION['u_image_url'] = $auth['u_image_url'];
        $_SESSION['flash_type'] = "success";
        $_SESSION['flash_message'] = "SUCCESSFULLY LOGED IN";
        /* echo '<pre>';
        print_r($_SESSION);
        echo '<pre>';    */
        
        header('Location: /pages/lecturer/dashboard.php');
    }
}

?>