<?php
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    session_start();
    if ($_SESSION['user_id'] == "") {
        header('Location: /');
        exit();
    }
