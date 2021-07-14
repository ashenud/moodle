<?php
require_once 'session.php';
require_once __DIR__ . "/../inc/files.php";

$ownerId = $_SESSION['user_id'];

// Determine request method
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $fileId = $_GET['id'];

    if (!$fileId) {
        header('Content-Type: application/json');
        http_response_code(422);
        echo json_encode([
            "error" => "File ID is required."
        ], JSON_PRETTY_PRINT);
        return;
    }

    // Fetch file info
    $fileInfo = getFileInfo($fileId);

    if (is_null($fileInfo)) {
        header('Content-Type: application/json');
        http_response_code(404);
        echo json_encode([
            "error" => "File not found."
        ], JSON_PRETTY_PRINT);
        return;
    }

    if ($fileInfo->getOwnerId() != $ownerId) {
        header('Content-Type: application/json');
        http_response_code(403);
        echo json_encode([
            "error" => "You are not allowed to access this resource."
        ], JSON_PRETTY_PRINT);
        return;
    }

    // Return file
    $mimeType = $fileInfo->getMimeType();
    $fileName = $fileInfo->getFileName();
    header("Content-Type: $mimeType");
    header("Content-Disposition: attachment; filename=$fileName");
    $fileStream = getFileStream($fileId);
    $outStream = fopen('php://output', 'w');
    $out = stream_copy_to_stream($fileStream, $outStream);
    fclose($fileStream);
    fclose($outStream);

} else {
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode([
        "error" => "Method not supported"
    ], JSON_PRETTY_PRINT);
}