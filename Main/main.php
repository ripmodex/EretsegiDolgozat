<?php

global $isLoggedIn;
global $userName;
global $isAdmin;

$mysqli =  require dirname(__DIR__) . '/Server/database.php';

$result = $mysqli->query("SELECT * FROM area LIMIT 5");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="stylesheet" href="mainStyle.css">
    <link rel="icon" type="image/jpg" href="../Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <?php include '../Common/menu.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
    <div id="content">
        <h1 style="text-align: center; color: #3aafff;">Explore Hallownest!</h1>
        <hr>
        <div id="areaContainer" data-area-container>
            <?php while ($area = $result->fetch_assoc()): ?>
                <div class="areaCard" id="area-<?= $area['id'] ?>" data-area-item
                     data-name="<?= strtolower(htmlspecialchars($area['name'])) ?>"> <!-- for the map part, i am not fully done with, later -->
                    <div class="areaImageContainer">
                        <img src="../Kepek/Area/<?= htmlspecialchars($area['main_image']) ?>"
                             alt="<?= htmlspecialchars($area['name']) ?>" data-area-img>
                    </div>
                    <div class="areaText">
                        <h2><?= htmlspecialchars($area['name']) ?></h2>
                        <p><?= nl2br(htmlspecialchars($area['description'])) ?></p>
                    </div>
                </div>
                <hr>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="../Common/mapScript.js"></script>
    <script src="../Search/searchArea.js"></script>
</body>
</html>