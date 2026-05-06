<?php

session_start();

$is_invalid=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mysqli= require dirname(__DIR__). "/Server/database.php";

    $sql="SELECT id, password_hash, role FROM user WHERE email=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user){
        if(password_verify($_POST["password"] ,$user["password_hash"])){
            $_SESSION["user_id"]=$user["id"];
            $_SESSION["role"]=(int)$user["role"];
            session_write_close();
            header("Location: ../Server/index.php");
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
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" href="../Kepek/icon.jpg">
</head>
<body>
    <?php include '../Common/menu.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
    <div id="content">
        <form method="post" >
            <h1>Log In to Hollow Wiki</h1>
            <h3>It is a great place to learn about the game called Hollow Knight. Welcome!</h3>
            <?php if($is_invalid): ?>
                <span style="color: #ff6b6b"><em><b>Invalid login</b></em></span>
            <?php endif; ?>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Email..." name="email" required
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Password..." name="password" required>
            </div>
            <span>If you don't have an account, make one <a href="../Signup/signup.php">here</a></span><br>
            <button id="loginButton">Log In</button>
        </form>
    </div>
    <script src="../Common/mapScript.js"></script>
</body>
</html>
