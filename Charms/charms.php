<?php

global $isLoggedIn;
global $userName;
global $isAdmin;

$path = dirname(__DIR__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    echo "Current Directory: " . __DIR__ . "<br>";
    die("Fatal Error: Could not find the file at: " . $path);
}

$mysqli = require dirname(__DIR__) . "/Server/database.php";
$result = $mysqli->query("SELECT * FROM charms ORDER BY name ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Charms</title>
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
            <li><a onclick="window.open('../Screenshots/screenshots.php', '_self')">Screenshots</a></li>
            <?php if($isAdmin): ?>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropBtn">Admin Panel</a>
                    <div class="dropdownContent">
                        <a onclick="window.open('../Charms/addCharm.php', '_self')">Charms</a>
                        <a onclick="window.open('../Screenshots/addScreenshot.php', '_self')">Screenshots</a>
                    </div>
                </li>
            <?php endif; ?>
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
        <div id="charmsContainer">
            <?php while($row=$result->fetch_assoc()): ?>
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


    <script src="../Main/mainScript.js"></script>
    <script src="charmsScript.js"></script>
</body>
</html>
