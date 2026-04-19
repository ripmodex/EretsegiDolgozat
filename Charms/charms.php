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
        <h1>Charms</h1>
        <hr>
        <div class="toolbar">
            <div class="searchGroup">
                <span class="searchIcon"></span><input type="search" placeholder="Search charms.." name="searchInput" data-search>
            </div>
            <div class="filterGroup">
                <select class="filterSelect" data-filter-category>
                    <option value="all">All categories</option>
                    <option value="Combat">Combat</option>
                    <option value="Magic">Magic</option>
                    <option value="Utility">Utility</option>
                    <option value="Companion">Companion</option>
                </select>
                <select class="filterSelect" data-filter-notches>
                    <option value="all">Any notches</option>
                    <option value="1">1 Notch</option>
                    <option value="2">2 Notches</option>
                    <option value="3">3 Notches</option>
                    <option value="4">4 Notches</option>
                </select>
            </div>
        </div>
        <hr>
        <div id="charmsContainer" data-charms-container>
            <template data-charms-template>
                <div class="charmCard" onclick="showDetails(this)"
                     data-name data-description data-location data-category data-image data-nothces>
                    <img src="" alt="" data-card-img>
                </div>
            </template>
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

    <script src="../Search/searchCharms.js"></script>
    <script src="../Common/mapScript.js"></script>
    <script src="charmsScript.js"></script>
</body>
</html>
