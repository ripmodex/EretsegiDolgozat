<?php

session_start();

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="../menuStyle.css">
    <link rel="stylesheet" href="../loginStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" href="../Kepek/icon.jpg">
</head>
<body>
    <div id="bg"></div>
    <nav id="menu">
        <img src="../Kepek/icon.jpg" alt="logo" id="menu-logo">
        <ul>
            <li><a>Charms</a></li>
            <li><a>Screenshots</a></li>
            <li><a>Negyedik</a></li>
        </ul>
        <div class="searchBox">
            <input type="text" placeholder="Search.." name="search">
        </div>
        <button onclick="window.open('../main.html','_self')">Home Page</button>
    </nav>
    <div id="content">
        <h1>Log In to Hollow Wiki</h1>
        <?php if(isset($user)): ?>
            <p>Hello <?= htmlspecialchars($user["username"]) ?></p>
            <p><a href="logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="login.php">Log in</a> or <a href="../signup.html">Sign up</a></p>
        <?php endif; ?>
    </div>
</body>
</html>
