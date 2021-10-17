<?php
ini_set('display_errors', 1);
require_once 'session.php';
require_once __DIR__ . "/../config/files.php";
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_moodle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$ownerId = $_SESSION['user_id'];

// Determine request method
$method = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['action'])){
    if($_GET['action']=='rename') {
        $id = $_GET['id'];
        $name = trim($_GET['nn']);


        $query = mysqli_query($conn, "SELECT * FROM user_files WHERE owner_id = '$ownerId' AND file_name='" . trim($_GET['nn']) . "' AND file_type='" . $_GET['ft'] . "'");

        if (mysqli_num_rows($query) > 0) {
            http_response_code(400);


            echo json_encode([
                "error" => "file_exist",
                'file_id' => $id,
                'file_name' => $name,
                'file_type' => $_GET['ft'],
            ], JSON_PRETTY_PRINT);
            die();
        }


        $query = mysqli_query($conn, "update user_files SET file_name='" . trim($_GET['nn']) . "', file_type='" . $_GET['ft'] . "', owner_id='$ownerId' WHERE id = '$id'");


    }elseif($_GET['action']=='replace'){
        $id = $_GET['id'];
        $name = trim($_GET['nn']);

        $query = mysqli_query($conn, "SELECT * FROM user_files WHERE owner_id = '$ownerId' AND file_name='" . trim($_GET['nn']) . "' AND  id <> '$id' AND file_type='" . $_GET['ft'] . "'");

        if (mysqli_num_rows($query) > 0) {
            $query = mysqli_query($conn, "DELETE FROM user_files WHERE owner_id = '$ownerId' AND file_name='" . trim($_GET['nn']) . "' AND  id <> '$id' AND file_type='" . $_GET['ft'] . "'");
        }


        $query = mysqli_query($conn, "update user_files SET file_name='" . trim($_GET['nn']) . "', file_type='" . $_GET['ft'] . "', owner_id='$ownerId' WHERE id = '$id'");


    }elseif($_GET['action']=='move'){
        $id = $_GET['id'];
        $name = trim($_GET['nn']);

        $query = mysqli_query($conn, "SELECT * FROM user_files WHERE owner_id = '$ownerId' AND file_name='" . trim($_GET['nn']) . "' AND file_type='" . $_GET['ft'] . "'");

        if (mysqli_num_rows($query) > 0) {
            http_response_code(400);


            echo json_encode([
                "error" => "file_exist",
                'file_id' => $id,
                'file_name' => $name,
                'file_type' => $_GET['ft'],
            ], JSON_PRETTY_PRINT);
            die();
        }


        $query = mysqli_query($conn, "update user_files SET file_name='" . trim($_GET['nn']) . "', file_type='" . $_GET['ft'] . "' WHERE id = '$id'");


    }elseif($_GET['action']=='star_file'){
        $id = $_GET['id'];



    $query = mysqli_query($conn, "SELECT * FROM user_files WHERE id='" . $id . "'");
       
        $result = mysqli_fetch_assoc($query);
        $name=$result['file_name'];

        $query = mysqli_query($conn, "SELECT * FROM user_files WHERE id='" . $id . "'");
        $star=1;
        $result = mysqli_fetch_assoc($query);
        if($result['starred']=='1')
            $star=0;
        else{
            $star=1;
        }




        $query = mysqli_query($conn, "update user_files SET starred='".$star."' WHERE id = '$id'");

    }elseif($_GET['action']=='delete'){
        $id = $_GET['id'];

        $query = mysqli_query($conn, "delete from user_files where  owner_id = '$ownerId' and id = '$id'");

    die('1');
    }elseif($_GET['action']=='copy'){
        $id = $_GET['id'];
        $name = trim($_GET['nn']);

        $query = mysqli_query($conn, "SELECT * FROM user_files WHERE file_name='" . trim($_GET['nn']) . "' AND file_type='" . $_GET['ft'] . "' AND  owner_id = '$ownerId'");
        if (mysqli_num_rows($query) > 0) {
            http_response_code(400);


            $query = mysqli_query($conn, "SELECT * FROM user_files WHERE id='" . $id . "'");

            $result = mysqli_fetch_assoc($query);

            $mimeType =$result['mime_type'];

            $fileName = trim($_GET['nn']) ?? 'Unnamed File';
            $size=$result['file_size'];
            $fileType = $_GET['ft'] ?? 'misc';

            $f_ile = resolveFilePath($id);

            $fp = fopen(__DIR__ . '/../storage/files/'.$f_ile, 'r');

            $fileInfo = postFile('0', $fp, $fileName, $fileType, $mimeType, $size, '0');
            fclose($fp);



            echo json_encode([
                "error" => "file_exist",
                'file_id' => $fileInfo->getId(),
                'file_name' => $fileInfo->getFileName(),
                'file_type' => $fileInfo->getFileType(),
            ], JSON_PRETTY_PRINT);
            die();
        }

        $query = mysqli_query($conn, "SELECT * FROM user_files WHERE id='" . $id . "'");

        $result = mysqli_fetch_assoc($query);

        $mimeType =$result['mime_type'];

        $fileName = trim($_GET['nn']) ?? 'Unnamed File';
        $size=$result['file_size'];
        $fileType = $_GET['ft'] ?? 'misc';

        $f_ile = resolveFilePath($id);

        $fp = fopen(__DIR__ . '/../storage/files/'.$f_ile, 'r');

        $fileInfo = postFile($ownerId, $fp, $fileName, $fileType, $mimeType, $size, '0');
        fclose($fp);



    }


    $fileList = getFileList($ownerId);
    echo json_encode([
        "files" => array_map(function(FileInfo $file) {
            return [
                "id" => $file->getId(),
                "owner_id" => $file->getOwnerId(),
                "file_name" => $file->getFileName(),
                "file_type" => $file->getFileType(),
                "mime_type" => $file->getMimeType(),
                "starred" => $file->is_star(),
                "file_size" => $file->getFileSize(),
                "uploaded_date" => $file->getUploadedDate()->format(DATE_ATOM),
                "uploaded_date_hmn" => $file->getUploadedDate()->format('M j, Y'),
                "uploaded_time_hmn" => $file->getUploadedDate()->format("g:i A")
            ];
        }, $fileList)
    ]);


die();


}



if ($method === 'GET') {
    $fileList = getFileList($ownerId);
    echo json_encode([
        "files" => array_map(function(FileInfo $file) {
            return [
                "id" => $file->getId(),
                "owner_id" => $file->getOwnerId(),
                "file_name" => $file->getFileName(),
                "file_type" => $file->getFileType(),
                "mime_type" => $file->getMimeType(),
                "starred" => $file->is_star(),
                "file_size" => $file->getFileSize(),
                "uploaded_date" => $file->getUploadedDate()->format(DATE_ATOM),
                "uploaded_date_hmn" => $file->getUploadedDate()->format('M j, Y'),
                "uploaded_time_hmn" => $file->getUploadedDate()->format("g:i A")
            ];
        }, $fileList)
    ]);
} else if ($method === 'POST') {


    $query = mysqli_query($conn, "SELECT * FROM user_files WHERE owner_id = '$ownerId' AND file_name='".trim($_GET['fn'])."' AND file_type='".$_GET['ft']."'");
    if(mysqli_num_rows($query) > 0){
        http_response_code(400);

        $size = $_SERVER['CONTENT_LENGTH'];
        $mimeType = $_SERVER['CONTENT_TYPE'] ?? 'application/octet-stream';
        $fileName = trim($_GET['fn']) ?? 'Unnamed File';
        $fileType = $_GET['ft'] ?? 'misc';
        $fp = fopen("php://input", 'r');
        $fileInfo = postFile('0', $fp, $fileName, $fileType, $mimeType, $size, '0');
        fclose($fp);


        echo json_encode([
            "error" => "file_exist",
            'file_id' => $fileInfo->getId(),
            'file_name' => $fileInfo->getFileName(),
            'file_type' => $fileInfo->getFileType(),
        ], JSON_PRETTY_PRINT);
        die();
    }


    $size = $_SERVER['CONTENT_LENGTH'];
    $mimeType = $_SERVER['CONTENT_TYPE'] ?? 'application/octet-stream';
    $fileName = trim($_GET['fn']) ?? 'Unnamed File';
    $fileType = $_GET['ft'] ?? 'misc';
    $fp = fopen("php://input", 'r');
    $fileInfo = postFile($ownerId, $fp, $fileName, $fileType, $mimeType, $size, '0');
    fclose($fp);

    echo json_encode([
        "file" => [
            "id" => $fileInfo->getId(),
            "owner_id" => $fileInfo->getOwnerId(),
            "file_name" => $fileInfo->getFileName(),
            "file_type" => $fileInfo->getFileType(),
            "mime_type" => $fileInfo->getMimeType(),
            "starred" => $fileInfo->is_star(),
            "file_size" => $fileInfo->getFileSize(),
            "uploaded_date" => $fileInfo->getUploadedDate()->format(DATE_ATOM),
            "uploaded_date_hmn" => $fileInfo->getUploadedDate()->format('M j, Y'),
            "uploaded_time_hmn" => $fileInfo->getUploadedDate()->format("g:i A")
        ],
    ], JSON_PRETTY_PRINT);
} else {
    http_response_code(400);
    echo json_encode([
        "error" => "Method not supported"
    ], JSON_PRETTY_PRINT);
}

