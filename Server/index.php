<?php

session_start();

global $isAdmin;

$path = dirname(__DIR__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    echo "Current Directory: " . __DIR__ . "<br>";
    die("Fatal Error: Could not find the file at: " . $path);
}

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id={$_SESSION["user_id"]}";

    $indexResult = $mysqli->query($sql);

    $user = $indexResult->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="../Login/loginStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" href="../Kepek/icon.jpg">
</head>
<body>
    <?php include '../Common/nav.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
    <div id="content">
        <h1>Log In to Hollow Wiki</h1>
        <?php if(isset($user)): ?>
            <p>Hello <?= htmlspecialchars($user["username"]) ?></p>
            <p><a href="logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="../Login/login.php">Log in</a> or <a href="../Signup/signup.php">Sign up</a></p>
        <?php endif; ?>
    </div>
    <script src="../Common/mapScript.js"></script>
</body>
</html>
