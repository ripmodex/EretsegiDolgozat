<?php
if(empty($_POST["username"])){
    die("Username is required");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters long");
}

if(!preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter.");
}

if(!preg_match("/[0-9]/i", $_POST["password"])){
    die("Password must contain at least one number.");
}

if($_POST["password"] !== $_POST["passwordAgain"]){
    die("Passwords must match");
}

$passwordHash=password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli=require __DIR__ . "/database.php";

$sql= "INSERT INTO user(username, email, password_hash)
       VALUES(?, ?, ?)";  //if an error is shown, try fixing this, i fixed it, the problem was i wrote name instead of username

$stmt=$mysqli->stmt_init();

if(!$stmt->prepare($sql)){
    die("SQL error: ". $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["username"],
                  $_POST["email"],
                  $passwordHash);

try{
    $stmt->execute();
    header("Location: ../signupSuccess.html"); //if it is not working properly in the past maybe try with if/else
    exit;
}
catch(mysqli_sql_exception $e){
    if($mysqli->errno===1062) {
        die("Error: That email is already registered.");
    }
    else{
        die("Database error:" . $e->getMessage());
    }
}
