<?php
session_start();

if(!isset($_SESSION["user_id"])){
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
    $name = trim($_POST["name"]);
    $desc = trim($_POST["description"]);
    $notches = (int)$_POST["notches"];
    $location = $_POST["location"];
    $category =$_POST["category"];

    $imageName = $_FILES["image"]["name"];
    $imageType = $_FILES["image"]["type"];
    $targetDir = "../Kepek/Charms/";
    $targetFile = $targetDir . basename($imageName);

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

    if(!in_array($imageType, $allowedTypes)){
        $message = "Only image files are allowed (jpg, png, gif, webp).";
    }
    else if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
        $sql = "INSERT INTO charms (name, description, notches, imagePath, location, category) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssisss", $name, $desc, $notches, $imageName, $location, $category);

        if($stmt->execute()){
            $message = "Charm added successfully.";
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
    <title>Admin - Add Charm</title>
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="stylesheet" href="charmStyle.css">
    <link rel="icon" type="image/jpg" href="../Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <?php include '../Common/menu.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
    <div id="content">
        <div class="adminContainer">
            <h1>Add new Charm</h1>
            <hr>
            <?php if($message) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>

            <form action="addCharm.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Charm name" style="width: 20ch;" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="number" name="notches" placeholder="Notch cost" min="1" max="5" style="width: 20ch;" required>
                <input type="text" name="location" placeholder="Found in..." style="width: 20ch;" required>
                <input type="text" name="category" placeholder="Category..." style="width: 20ch;" required>
                <input type="file" name="image" accept="image/*" required>

                <button type="submit">Upload Charm</button>
            </form>
            <a href="charms.php">Back to Charms</a>
        </div>
    </div>
    <script src="../Common/mapScript.js"></script>
</body>
</html>
