<?php
session_start();
include_once('../config/User.php');

$user = new User();

if(isset($_POST['register_type'])){

    $user_type = $_POST['register_type'];

    /* echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    die(); */

    $first_name = $_POST[$user_type.'_fname'];
    $last_name = $_POST[$user_type.'_lname'];
    $dob = $_POST[$user_type.'_dob'];
    $gender = $_POST[$user_type.'_gender'];
    $mobile = $_POST[$user_type.'_mobile'];
    $email = $_POST[$user_type.'_email'];
    $address = $_POST[$user_type.'_address'];
    $username = $_POST[$user_type.'_username'];
    $password = md5($_POST[$user_type.'_password']);

    if( $user_type == "std"){        
        $al_stream = $_POST[$user_type.'_al_stream'];
        $uni_stream = $_POST[$user_type.'_uni_stream'];
        $ol_eng_result = $_POST[$user_type.'_ol_eng_result'];
        $al_eng_result = $_POST[$user_type.'_al_eng_result'];

        $register_user = $user->register_student($first_name,$last_name,$dob,$gender,$mobile,$email,$address,$username,$password,$al_stream,$uni_stream,$ol_eng_result,$al_eng_result);
    }
    else {
        $specialized = $_POST[$user_type.'_specialized'];
        $university = $_POST[$user_type.'_university'];

        $register_user = $user->register_lecturer($first_name,$last_name,$dob,$gender,$mobile,$email,$address,$username,$password,$specialized,$university);
    }

    if($register_user){
        $_SESSION['flash_type'] = "success";
        $_SESSION['flash_message'] = "USER RAGISTRATION SUCCESSFULLY";
        header('Location: /');
    }
    else{
        $_SESSION['flash_type'] = "error";
        $_SESSION['flash_message'] = "USER RAGISTRATION NOT SUCCESSFULLY";
        header('Location: /');
    }    

}
?>