<?php

$mysqli = require dirname(__DIR__) . "/Server/database.php";
header('Content-Type: application/json');
$result = $mysqli->query("SELECT name, description, notches, imagePath, location, category FROM charms");
if(!$result){
    http_response_code(500);
    echo json_encode(["error" => "Database error"]);
    exit;
}
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);