<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION["user_id"]);
$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === 1;

if(isset($_SESSION['user_id'])){
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT username,role FROM user WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    if($user){
        $userName=$user["username"];
        $isAdmin=((int)$user["role"]===1);
    }
}
