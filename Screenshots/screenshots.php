<?php

global $isLoggedIn;
global $userName;
global $isLoggedIn;

$path = dirname(__DIR__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    echo "Current Directory: " . __DIR__ . "<br>";
    die("Fatal Error: Could not find the file at: " . $path);
}

$mysqli = require dirname(__DIR__) . '/Server/database.php';
$sql = "SELECT * FROM screenshots ORDER BY id DESC";
$result = $mysqli->query($sql);

$allScreenshots = [];
while ($row = $result->fetch_assoc()){
    $allScreenshots[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Screenshots</title>
    <link rel="stylesheet" href="../Main/mainStyle.css">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="stylesheet" href="screenshotStyle.css">
    <link rel="icon" type="image/jpg" href="../Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<nav id="menu">
    <img src="../Kepek/icon.jpg" alt="logo" id="menu-logo">
    <ul>
        <li><a onclick="window.open('../Main/main.php', '_self')">Home</a></li>
        <li><a onclick="window.open('../Charms/charms.php', '_self')">Charms</a></li>
        <li><a onclick="window.open('../Screenshots/addScreenshot.php', '_self')">Admin - Screenshots</a></li>
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
<div id="phpData" dataScreenshots='<?= json_encode($allScreenshots) ?>' style="display: none"></div>
<div id="bg"></div>
    <div id="content">
        <h1>Slideshow</h1>
        <div id="slideshowContainer">
            <div id="slideContent">
                <img id="slideImg" src="" alt="Slideshow">
                <div id="slideTitle"></div>
            </div>
        </div>
        <br><br><br>
        <h1>Screenshots</h1>
        <div id="ssModal" class="modal" onclick="this.style.display='none'">
            <div class="modalContent" onclick="event.stopPropagation()">
                <span class="close" onclick="document.getElementById('ssModal').style.display='none'"
                      style="float: right; font-size: 30px; cursor: pointer; margin-right: 15px; color: red">&times;</span>
                <img id="modalSSImg" src="" style="width:100%">
                <div class="modalInfo" style="text-align: center; color: white; padding-top: 15px">
                    <h2 id="modalSSTitle" style="margin: 5px 0"></h2>
                    <p id="modalSSCaption" style="font-style: italic; color: #bbb;"></p>
                </div>
            </div>
        </div>
        <div id="screenshotGrid">
            <?php foreach($allScreenshots as $ss): ?>
                <div class="ssCard" onclick="openSSModal(<?=htmlspecialchars(json_encode($ss))?>)">
                    <img src="../Kepek/Screenshots/<?= $ss['imagePath'] ?>" alt="Screenshot" style="margin: 5px;">
                    <div class="ssOverlay" style="margin: 5px;">View details</div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<script src="screenshotScript.js"></script>
</body>
</html>
