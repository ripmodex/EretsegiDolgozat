<?php

$mysqli = require dirname(__DIR__) . "/Server/database.php";
header('Content-Type: :application/json');
$result = $mysqli->query("SELECT * FROM charms");
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);