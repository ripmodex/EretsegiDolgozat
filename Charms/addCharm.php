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
    //die("Session ID is missing. You are not logged in.");
    header("Location: ../Login/login.php");
    exit;
}

if(!isset($_SESSION["role"]) || (int)$_SESSION["role"] !== 1){
    //die("Role mismatch. Your role is: " . $_SESSION["role"]);
    header("Location: ../Main/main.php");
    exit;
}

/* for debugging
echo "<h3>Session Debugger</h3>";
echo "User ID: " . ($_SESSION["user_id"] ?? "Not Set") . "<br>";
echo "Role Value: " . ($_SESSION["role"] ?? "Not Set") . "<br>";
echo "Type of Role: " . gettype($_SESSION["role"] ?? null) . "<br>";
*/

$mysqli = require dirname(__DIR__) . "/Server/database.php";

$message = "";

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $notches = (int)$_POST["notches"];
    $location = $_POST["location"];
    $category =$_POST["category"];

    $imageName = $_FILES["image"]["name"];
    $targetDir = "../Kepek/Charms/";
    $targetFile = $targetDir . basename($imageName);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
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
    <link rel="stylesheet" href="../Main/mainStyle.css">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="stylesheet" href="charmStyle.css">
    <link rel="icon" type="image/jpg" href="../Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <nav id="menu">
        <img src="../Kepek/icon.jpg" alt="logo" id="menu-logo">
        <ul>
            <li><a onclick="window.open('../Main/main.php', '_self')">Home</a></li>
            <!-- <li><a href="javascript:void(0)" onclick="openMap()">Map</a></li> -->
            <li><a onclick="window.open('../Charms/charms.php', '_self')">Charms</a></li>
            <li><a>Screenshots</a></li>
        </ul>
        <div class="searchBox">
            <input type="text" placeholder="Search.." name="search">
        </div>
        <?php if($isLoggedIn):?>
            <button onclick="window.open('../Server/index.php', '_self')"><?= htmlspecialchars($userName)?></button>
        <?php else: ?>
            <button onclick="window.open('../Login/login.php','_self')">Log In</button>
            <button onclick="window.open('../Signup/signup.html', '_self')">Sign Up</button>
        <?php endif; ?>
    </nav>
    <div id="bg"></div>
    <div id="content">
        <div class="adminContainer">
            <h1>Add new Charm</h1>
            <?php if($message) echo "<p>$message</p>"; ?>

            <form action="addCharm.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Charm name" style="width: 20ch;" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="number" name="notches" placeholder="Notch cost" min="1" max="5" style="width: 20ch;" required>
                <input type="text" name="location" placeholder="Found in..." style="width: 20ch;">
                <input type="text" name="category" placeholder="Category..." style="width: 20ch;">

                <label>Charm icon: </label>
                <input type="file" name="image" accept="image/*" required>

                <button type="submit">Upload Charm</button>
            </form>
            <a href="charms.php">Back to Charms</a>
        </div>
    </div>
</body>
</html>
