<?php

$is_invalid=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mysqli=require __DIR__ . "/database.php";

    $sql=sprintf("SELECT *
                         FROM user
                         WHERE email='%s'",
                         $mysqli->real_escape_string($_POST["email"]));

    $result=$mysqli->query($sql);

    $user=$result->fetch_assoc();

    if($user){
        if(password_verify($_POST["password"] ,$user["password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"]=$user["id"];
            header("Location: index.php");
            exit;
        }
    }

    $is_invalid=true;
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
        <button onclick="window.open('../main.php','_self')">Home Page</button>
        <button onclick="window.open('../signup.html','_self')">Sign Up</button>
    </nav>
    <div id="content">
        <form method="post" >
            <h1>Log In to Hollow Wiki</h1>
            <h3>It is a great place to learn about the game called Hollow Knight. Welcome!</h3>
            <?php if($is_invalid): ?>
                <span style="color: #ff6b6b"><em><b>Invalid login</b></em></span>
            <?php endif; ?>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="Email..." name="email" required
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Password..." name="password" required>
            </div>
            <span>If you don`t have an account, make one <a href="../signup.html">here</a></span><br>
            <button id="loginButton">Log In</button>
            <!-- <p id="errorMessage" style="color: red; display:none">Please fill in all the field, thanks!</p> -->
        </form>
    </div>
    <script src="../loginScript.js"></script>
</body>
</html>
