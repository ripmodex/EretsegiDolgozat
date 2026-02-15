<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = false;
$username = "";

if(isset($_SESSION['user_id'])){
    $isLoggedIn = true;
    $mysqli = require __DIR__ . "/database.php";
    $sql="SELECT username FROM user WHERE id={$_SESSION['user_id']}";
    $result=$mysqli->query($sql);
    if($result && $user = $result->fetch_assoc()){
        $userName=$user["username"];
    }

}
