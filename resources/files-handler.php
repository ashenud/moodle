<?php
        require_once 'session.php';
        
        $ownerId = $_SESSION['user_id'];
        
        $servername = "localhost";
        $username ="root";
        $password ="";
        $dbname = "db_moodle";
        
        // Create connection
        $connect = new mysqli($servername, $username, $password, $dbname);
        
        
if(isset($_GET['action'])){
    
    if($_GET['action'] == "del"){
        $sql = "DELETE FROM `application_builder_tbl` WHERE ab_id='".$_POST['file_id']."' ";
        if (mysqli_query($connect, $sql)) {
             unlink($_POST['file_path']);
             header("location: /users/pages/student/scholarship.php");
        }
    }
    
    else if($_GET['action'] == "rename"){
        $sql = "UPDATE `application_builder_tbl` SET `file_name`='".$_POST['file_name']."'  WHERE ab_id='".$_POST['file_id']."' ";
        if (mysqli_query($connect, $sql)) {
             unlink($_POST['file_path']);
             header("location: /users/pages/student/scholarship.php");
        }
    }
    else if($_GET['action'] == "copy"){
        
        $sql = "SELECT * from application_builder_tbl where ab_id='".$_POST['file_id']."' ";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                 $name2 =pathinfo($row['file_path'], PATHINFO_FILENAME);
                 $rand = rand(10000,100000);  
                if (copy($row['file_path'], "zip/Copy_".$rand."_".$name2.".zip")) {
                $sql = "INSERT INTO application_builder_tbl (file_name, file_size,file_type,file_path,user_id)
                        VALUES ('".$_POST['file_name']."', '".$row['file_size']."', '".$row['file_type']."','zip/copy_".$rand.$name2.".zip','".$_SESSION['user_id']."')";
                    if (mysqli_query($connect, $sql)) {
                        header("location: /users/pages/student/scholarship.php");
                    }
                }
            }
        }
        
        
    }else{
       
    }
 
}


?>