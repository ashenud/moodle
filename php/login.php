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
        $_SESSION['id'] = $auth['id'];
        $_SESSION['type_id'] = $auth['type_id'];
        $_SESSION['first_name'] = $auth['first_name'];
        $_SESSION['last_name'] = $auth['last_name'];
        $_SESSION['name'] =  $auth['first_name']." ".$auth['last_name'];
        $_SESSION['address'] = $auth['address'];
        $_SESSION['email'] = $auth['email'];
        $_SESSION['image_url'] = $auth['image_url'];
        $_SESSION['flash_type'] = "success";
        $_SESSION['flash_message'] = "SUCCESSFULLY LOGED IN";
        /* echo '<pre>';
        print_r($_SESSION);
        echo '<pre>';    */
        if($auth['type_id'] == 1) {
            header('Location: /pages/lecturer/dashboard.php');
        }
        else {            
            header('Location: /pages/student/dashboard.php');
        }
    }
}

?>