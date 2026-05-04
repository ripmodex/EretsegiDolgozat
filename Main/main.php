<?php

$mysqli =  require dirname(__DIR__) . '/Server/database.php';

$result = $mysqli->query("SELECT name, description, main_image FROM area");
if(!$result){
    die("Database error: " . htmlspecialchars($mysqli->error));
}

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
                <div class="areaCard" id="<?= htmlspecialchars($area['name']) ?>" data-area-item
                     data-name="<?= strtolower(htmlspecialchars($area['name'])) ?>">
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
        <div class="bottomSpacer">
            <img src="../Kepek/soulTotem.jpg" alt="Soul Totem" class="footerIcon">
            <p>End of Hallownest</p>
        </div>
    </div>
    <button id="backToTop" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
        ↑ Return to Surface
    </button>

    <script src="../Common/mapScript.js"></script>
    <script src="../Search/searchArea.js"></script>
    <script>
        window.addEventListener("load", () => {
            if(window.location.hash){
                const id = decodeURIComponent(window.location.hash.substring(1));
                const target = document.getElementById(id);

                if(target){
                    setTimeout(() => {
                        target.scrollIntoView({ behavior: 'smooth', block: 'center'});
                        target.classList.add('highlightArea');
                        setTimeout(() => target.classList.remove('highlightArea'), 2000);
                    }, 500);
                }
            }
        });
    </script>
</body>
</html>