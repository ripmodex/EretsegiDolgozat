<?php
session_start();

global $isAdmin;
global $userName;
global $isLoggedIn;

$path = dirname(__DIR__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    echo "Current Directory: " . __DIR__ . "<br>";
    die("Fatal Error: Could not find the file at: " . $path);
}

if(!isset($_SESSION["user_id"])) {
    header("Location: ../Login/login.php");
    exit;
}

if(!isset($_SESSION["role"]) || (int)$_SESSION["role"] !== 1){
    header("Location: ../Main/main.php");
    exit;
}

$mysqli = require dirname(__DIR__) . "/Server/database.php";

$message = "";

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $title = $_POST["title"];
    $caption = $_POST["caption"];

    $imagePath = $_FILES["imagePath"]["name"];
    $targetDir = "../Kepek/Screenshots/";
    $targetFile = $targetDir . basename($imagePath);

    if(move_uploaded_file($_FILES["imagePath"]["tmp_name"], $targetFile)){
        $sql = "INSERT INTO screenshots (title, caption, imagePath) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $title, $caption, $imagePath);

        if($stmt->execute()){
            $message = "Screenshot added successfully.";
        }
        else{
            $message = "Database error: " .  $mysqli->error;
        }
    }
    else{
        $message = "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Add Screenshot</title>
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="icon" type="image/jpg" href="../Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <?php include '../Common/nav.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
    <div id="content">
        <div class="adminContainer">
            <h1>Add new Screenshot</h1>
            <?php if($message) echo "<p>$message</p>"; ?>

            <form action="addScreenshot.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title.." style="width: 40ch;" required>
                <textarea name="caption" placeholder="Caption.." required></textarea>
                <input type="file" name="imagePath" accept="image/*" required>

                <button type="submit">Upload Screenshot</button>
            </form>
            <a href="screenshots.php">Back to Screenshots</a>
        </div>
    </div>
    <script src="../Common/mapScript.js"></script>
</body>
</html>