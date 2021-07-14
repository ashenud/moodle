<?php
require_once 'session.php';
require_once __DIR__ . "/../inc/files.php";

$ownerId = $_SESSION['user_id'];

// Determine request method
$method = $_SERVER['REQUEST_METHOD'];
//echo $method;
if ($method === 'POST') {
   
       // echo $_SESSION['user_id'];
        $servername = "localhost";
        $username ="root";
        $password ="";
        $dbname = "db_moodle";
        
        // Create connection
        $connect = new mysqli($servername, $username, $password, $dbname);
        $rand = rand(10000,100000);        
        // Checking files are selected
        $zip = new ZipArchive(); // Load zip library 
        $zip_name = "zip/".$rand.$_POST['file_name'].".zip"; // Zip name
        if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
        { 
         // Opening zip file to load files
          $error .= "* Sorry ZIP creation failed at this time";
        }
        
        if(isset($_POST['folder_s']) and count($_POST['folder_s']) > 0)
        {  
            foreach($_POST['folder_s'] as $folder)
            { 
                $sql = "SELECT * from user_files where owner_id='".$ownerId."' and file_type='".$folder."'";
    			$result = mysqli_query($connect, $sql);
    			if (mysqli_num_rows($result) > 0) {
    				// output data of each row
    				while ($row = mysqli_fetch_assoc($result)) {
                         // Adding files into zip
    				    //echo $row['mime_type'];
    				    $mimeType = $row['mime_type'];//$fileInfo->getMimeType();
                        $fileName = $row['file_name'];//$fileInfo->getFileName();
                        $filePath = resolveFilePath($row['id']);
                        //echo $row['file_name'];
                        $file_ext = pathinfo($row['file_name'], PATHINFO_EXTENSION);
                       
                        $zip->addFromString(basename('../../../data/'.$filePath.".".$file_ext),  file_get_contents( '../../../data/'.$filePath));
                        
    				}
    			
    			}
            }
            
                	//var_dump($zip);
                    
    				$zip->close();
    				//echo filesize($zip_name);
                    //echo mime_content_type($zip_name);
                    if(file_exists($zip_name))
                    {
                        $sql = "INSERT INTO application_builder_tbl (file_name, file_size,file_type,file_path,user_id)
                        VALUES ('".$_POST['file_name'].".zip', '".filesize($zip_name)."', '".mime_content_type($zip_name)."','".$zip_name."','".$_SESSION['user_id']."')";
                        
                        if (mysqli_query($connect, $sql)) {
                          // push to download the zip
                            header('Set-Cookie: fileLoading=true');;
                            header('Content-type: application/zip');
                            header('Content-Disposition: attachment; filename="'.$_POST['file_name'].'.zip"');
                            readfile($zip_name);
                            
                            //header('Location: '.$zip_name);
                            //header('Location: /users/pages/student/scholarship.php');
                            
                            
                            // header( "refresh:0;url=/users/pages/student/scholarship.php" );
                            
                            // remove zip file is exists in temp path
                            //unlink($zip_name);
                        } 
                        
                    }
                    
        //$zip->close();
    }else if(isset($_POST['file_s']) and count($_POST['file_s']) > 0){
        echo count($_POST['file_s']);
                foreach($_POST['file_s'] as $file_me)
                { 
                    $sql = "SELECT * from user_files where id='".$file_me."' and owner_id='".$ownerId."' ";
        			$result = mysqli_query($connect, $sql);
        			if (mysqli_num_rows($result) > 0) {
        				// output data of each row
        				while ($row = mysqli_fetch_assoc($result)) {
                             // Adding files into zip
        				    echo $row['mime_type'];
        				    $mimeType = $row['mime_type'];//$fileInfo->getMimeType();
                            $fileName = $row['file_name'];//$fileInfo->getFileName();
                            $filePath = resolveFilePath($row['id']);
                           
                            $file_ext = pathinfo($row['file_name'], PATHINFO_EXTENSION);
                           
                            $zip->addFromString(basename('../../../data/'.$filePath.".".$file_ext),  file_get_contents( '../../../data/'.$filePath));
        				}
        			}
                }
        	    var_dump($zip);
				$zip->close();
				
                if(file_exists($zip_name))
                {
                    $sql = "INSERT INTO application_builder_tbl (file_name, file_size,file_type,file_path,user_id)
                        VALUES ('".$_POST['file_name'].".zip', '".filesize($zip_name)."', '".mime_content_type($zip_name)."','".$zip_name."','".$_SESSION['user_id']."')";
                        
                        if (mysqli_query($connect, $sql)) {
                              // push to download the zip
                              header('Set-Cookie: fileLoading=true');
                              header('Content-type: application/zip');
                              header('Content-Disposition: attachment; filename="'.$_POST['file_name'].'.zip"');
                              readfile($zip_name);
                              
                              //header('Location: /users/pages/student/scholarship.php');
                              //header( "refresh:5;url=/users/pages/student/scholarship.php" );
                              // remove zip file is exists in temp path
                              //unlink($zip_name);
                        }
                }
    }
    // Return file
    


} else {
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode([
        "error" => "Method not supported"
    ], JSON_PRETTY_PRINT);
}
?>
<script type="text/javascript">
    //location = '/users/pages/student/scholarship.php'
</script>