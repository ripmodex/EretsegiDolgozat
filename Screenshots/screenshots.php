<?php

global $isLoggedIn;
global $userName;
global $isAdmin;

$mysqli = require dirname(__DIR__) . '/Server/database.php';
$sql = "SELECT * FROM screenshots ORDER BY id DESC";
$result = $mysqli->query($sql);

$allScreenshots = [];
while ($row = $result->fetch_assoc()){
    array_push($allScreenshots, $row);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Screenshots</title>
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="stylesheet" href="screenshotStyle.css">
    <link rel="icon" type="image/jpg" href="../Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <?php include '../Common/menu.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="phpData" dataScreenshots='<?= json_encode($allScreenshots) ?>' style="display: none"></div>  <!-- AJAX -->
    <div id="bg"></div>
        <div id="content">
            <h1>Slideshow</h1>
            <hr>
            <div id="slideshowContainer" style="width: 85%; max-width: 1000px; margin: auto;">
                <div id="slideContent">
                    <img id="slideImg" src="" alt="Slideshow">
                    <div id="slideTitle"></div>
                    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>-->
                    <!-- <a class="next" onclick="plusSlides(1)">&#10095;</a>-->
                </div>
            </div>
            <br><br><br>
            <h1>Screenshots</h1>
            <hr>
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
                        <img src="../Kepek/Screenshots/<?= $ss['imagePath'] ?>" alt="Screenshot" style="margin: 5px; max-width: 1000px;">
                        <div class="ssOverlay" style="margin: 5px;">View details</div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    <script src="screenshotScript.js"></script>
    <script src="../Common/mapScript.js"></script>
</body>
</html>
