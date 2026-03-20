<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

//$isLoggedIn = false;
//$username = "";
//$isAdmin = false;

$isLoggedIn = isset($_SESSION["user_id"]);
$username = $_SESSION["username"] ?? "";
$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === 1;

if(isset($_SESSION['user_id'])){
    $isLoggedIn = true;
    $mysqli = require __DIR__ . "/database.php";
    $sql="SELECT username,role FROM user WHERE id={$_SESSION['user_id']}";
    $result=$mysqli->query($sql);
    $user=$result->fetch_assoc();
    if($user){
        $userName=$user["username"];
        $isAdmin=((int)$user["role"]===1);
    }
    /*
    if($user = $result->fetch_assoc()){
        if((int)$user["role"]===1){
            $isAdmin = true;
        }
    }*/
}
