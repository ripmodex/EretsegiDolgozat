<?php

#require __DIR__ . "/Server/profile.php";
$path = dirname(__FILE__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    die("Fatal Error: Could not find the file at: " . $path);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="mainStyle.css">
    <link rel="stylesheet" href="menuStyle.css">
    <link rel="stylesheet" href="contentStyle.css">
    <link rel="icon" type="image/jpg" href="Kepek/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <nav id="menu">
        <img src="Kepek/icon.jpg" alt="logo" id="menu-logo">
        <ul>
            <li><a href="javascript:void(0)" onclick="openMap()">Map</a></li>
            <li><a>Charms</a></li>
            <li><a>Screenshots</a></li>
            <li><a>Negyedik</a></li>
        </ul>
        <div class="searchBox">
            <input type="text" placeholder="Search.." name="search">
        </div>
        <?php if($isLoggedIn):?>
            <button onclick="window.open('Server/index.php', '_self')"><?= htmlspecialchars($userName)?></button>
        <?php else: ?>
            <button onclick="window.open('Server/login.php','_self')">Log In</button>
            <button onclick="window.open('signup.html', '_self')">Sign Up</button>
        <?php endif; ?>
    </nav>

    <audio id="hoverSound" src="Sounds/hoverSound.mp3" preload="auto"></audio>
    <div id="mapOverlay" class="map-overlay">
        <div class="map-wrapper">
            <button class="closeMapOverlay" onclick="closeMap()">&times;</button>
            <img src="Kepek/Map/main.jpg" id="mapDisplay" usemap="#hkMap" alt="Hollow Knight Map"> <!--onload="makeMapResponsive()" -->
            <!-- and maybe I will delete the makeMapResponsive, because I think it does not really help in its job-->
            <map name="hkMap">
                <area shape="rect" coords="432, 199, 555, 239" alt="Forgotten Crossroads"
                      onmouseover="changeImage('Kepek/Map/forgottenCrossroads.jpg'); playHoverSound();"
                      onmouseout="resetImage()">    <!--href="#forgottenCrossroads"o-->
                <area shape="rect" coords="399, 153, 513, 193" alt="Dirtmouth"
                      onmouseover="changeImage('Kepek/Map/dirtmouth.jpg'); playHoverSound();"
                      onmouseout="resetImage()">     <!--href="#dirthmouth" -->
                <area shape="rect" coords="692, 376, 782, 430" alt="The Hive"
                      onmouseover="changeImage('Kepek/Map/theHive.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="520, 163, 564, 159, 564, 131, 607, 126, 630, 112, 630, 162, 653, 165, 653, 193, 608, 193, 606, 209, 629, 213, 629, 221, 565, 225, 565, 177, 520, 172" alt="Crystal Peak"
                      onmouseover="changeImage('Kepek/Map/crystalPeak.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="303, 116, 413, 116, 413, 162, 390, 162, 390, 190, 361, 192, 361, 176, 320, 177, 306, 160" alt="Howling Cliffs"
                      onmouseover="changeImage('Kepek/Map/howlingCliffs.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="247, 185, 356, 185, 356, 197, 424, 197, 424, 229, 411, 244, 314, 244, 314, 213, 247, 213" alt="Greenpath"
                      onmouseover="changeImage('Kepek/Map/greenpath.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="565, 226, 655, 226, 655, 200, 712, 200, 712, 245, 635, 245, 633, 250, 565, 250" alt="Resting Grounds"
                      onmouseover="changeImage('Kepek/Map/restingGrounds.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="337, 254, 430, 253, 430, 246, 446, 246, 446, 272, 407, 272, 407, 300, 376, 300, 376, 273, 337, 273" alt="Fog Canyon"
                      onmouseover="changeImage('Kepek/Map/fogCanyon.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="269, 256, 330, 256, 330, 280, 368, 280, 368, 320, 250, 320, 250, 284, 261, 269" alt="Queen`s Gardens"
                      onmouseover="changeImage('Kepek/Map/queensGarden.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="410, 285, 450, 285, 450, 245, 452, 245, 475, 245, 475, 260, 489, 260, 489, 346, 473, 346, 473, 368, 438, 368, 438, 325, 375, 323, 375, 307, 410, 308" alt="Fungal Wastes"
                      onmouseover="changeImage('Kepek/Map/fungalWastes.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="496, 248, 517, 248, 517, 261, 610, 262, 623, 271, 642, 287, 642, 251, 642, 251, 654, 253, 655, 308, 690, 309, 690, 336, 496, 335" alt="City of Tears"
                      onmouseover="changeImage('Kepek/Map/cityOfTears.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="665, 289, 665, 274, 677, 267, 693, 260, 720, 260, 720, 322, 787, 322, 787, 375, 685, 375, 685, 423, 625, 423, 625, 410, 665, 410, 665, 365, 694, 365, 694, 295, 669, 292" alt="Kingdom`s Edge"
                      onmouseover="changeImage('Kepek/Map/kingdomsEdge.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="477, 350, 493, 350, 493, 343, 676, 343, 676, 360, 662, 360, 662, 390, 596, 390, 596, 405, 540, 405, 540, 378, 477, 378" alt="Royal Waterways"
                      onmouseover="changeImage('Kepek/Map/royalWaterways.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="445, 434, 498, 434, 501, 429, 542, 429, 448, 423, 448, 410, 623, 410, 623, 425, 595, 422, 595, 432, 646, 432, 646, 472, 514, 471, 511, 467, 445, 467" alt="Ancient Basin"
                      onmouseover="changeImage('Kepek/Map/ancientBasin.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
                <area shape="poly" coords="294, 330, 400, 330, 400, 333, 422, 333, 422, 356, 434, 356, 434, 370, 405, 370, 405, 410, 445, 410, 445, 424, 320, 424, 320, 408, 258, 408, 258, 423, 228, 423, 228, 358, 281, 358, 281, 379, 294, 379" alt="Deepnest"
                      onmouseover="changeImage('Kepek/Map/deepnest.jpg'); playHoverSound();"
                      onmouseout="resetImage()">
            </map>
        </div>
    </div>

    <div id="bg"></div>
    <div id="content">
        <h1>Mi is ez az oldal?</h1>
        <p>Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.</p>
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.<br><br>
        <img src="Kepek/hollowknight.jpg" alt="kep" class="content-img"><br>
        <br> Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.<br><br>
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.
        Ez egy olyan oldal lesz ahol, megprobalok segiteni a Hollow Knightban, segiteni a haladasban, egy guide ugymond, megprobalom, hogy megtalald a legjobb utat neked a jatek kijatszasahoz.<br><br>
        <img src="Kepek/wanderer.png" alt="wanderer" class="content-img">
    </div>
    <script src="mainScript.js"></script>
</body>
</html>