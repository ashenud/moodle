<?php
session_start();
include_once('../config/User.php');

$user = new User();

if(isset($_POST['submit'])){

    $u_name ="";
    $email ="";
    $password ="";

    $u_name = $_POST['name'];
    $email = $_POST['email'];
    if($_POST['password']!=""){
        $password = md5($_POST['password']);
    }

    $register_user = $user->register_user($u_name,$email,$password);

    if($register_user == 0){
        $_SESSION['message'] = 'not added';
        header('Location: /users/pages/student/');
    }
    else{
        $_SESSION['message'] = 'Added Successfully';
        header('Location: /users/pages/student/');
    }    

}
?>