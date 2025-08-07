<?php
// Allow cross-origin requests
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $data = json_decode(file_get_contents("php://input"), true);

    // header("Content-Type: application/json");
    // echo json_encode([
    //     "status" => "success",
    //     "received" => $data
    // ]);
    echo "Hello Api";
    exit;
}

// Default response for GET
header("Content-Type: application/json");
echo json_encode(["message" => "Send POST data to this endpoint"]);