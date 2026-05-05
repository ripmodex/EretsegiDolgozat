<?php

$mysqli = require dirname(__DIR__) . "/Server/database.php";

//$sql = sprintf("SELECT id FROM user WHERE email = '%s'",
//    $mysqli->real_escape_string($_GET["email"]));
//
//$result = $mysqli->query($sql);
//
//$is_available = $result->num_rows === 0;

if(!isset($_GET["email"])){
    http_response_code(400);
    echo json_encode(["error" => "Missing email parameter"]);
    exit;
}

$sql = "SELECT id FROM user WHERE email= ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET["email"]);
$stmt->execute();
$result=$stmt->get_result();
$is_available = $result->num_rows === 0;

header("Content-type: application/json");
echo json_encode(["available" => $is_available]);