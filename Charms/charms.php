<?php

global $isLoggedIn;
global $userName;
global $isAdmin;

$path = dirname(__DIR__) . '/Server/profile.php';

$mysqli = require dirname(__DIR__) . "/Server/database.php";
$charmResult = $mysqli->query("SELECT * FROM charms ORDER BY name ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Charms</title>
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
        <div id="charmsContainer">
            <?php while($row=$charmResult->fetch_assoc()): ?>
                <div class="charmCard" onclick="showDetails(
                        '<?= htmlspecialchars($row['name']) ?>',
                        '<?= htmlspecialchars($row['description']) ?>',
                        '<?= htmlspecialchars($row['location']) ?>',
                        '<?= htmlspecialchars($row['category']) ?>',
                        '../Kepek/Charms/<?= $row['imagePath'] ?>',
                        '<?= $row['notches'] ?>'
                )">
                    <img src="../Kepek/Charms/<?= $row['imagePath'] ?>" alt="<?= $row['imagePath'] ?>">
                    <!--<div class="notchCount">Cost: --><?php //= $row['notches'] ?><!--</div>-->
                </div>
            <?php endwhile; ?>
        </div>

        <div id="charmModal" class="modal" onclick="closeModal()">
            <div class="modalContent" onclick="event.stopPropagation()">
                <span class="closeButton" onclick="closeModal()">&times;</span>
                <img id="modalImg" src="" alt="">
                <h2 id="modalName"></h2>
                <p id="modalDescription"></p>
                <p id="modalLocation"></p>
                <p id="modalCategory"></p>
                <p id="modalNotches" style="color: #3aafff; font-weight: bold;"></p>
            </div>
        </div>
    </div>


    <script src="../Common/mapScript.js"></script>
    <script src="charmsScript.js"></script>
</body>
</html>
