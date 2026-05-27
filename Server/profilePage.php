<?php

session_start();

global $isAdmin;

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT username FROM user WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $user_id = $_SESSION["user_id"];

    $statsQuery = "SELECT COUNT(*) as total_enemies, SUM(CASE WHEN ue.is_discovered = 1 THEN 1 ELSE 0 END) as found_count
                   FROM enemies e 
                   LEFT JOIN user_enemies ue ON e.id = ue.enemy_id AND ue.user_id = $user_id";

    $statsResult = $mysqli->query($statsQuery);
    $stats = $statsResult->fetch_assoc();
    $percent = ($stats['total_enemies'] > 0) ? round(($stats['found_count'] / $stats["total_enemies"])*100) : 0;

    $query = "SELECT e.id, e.name, IFNULL(ue.is_discovered, 0) as is_discovered
              FROM enemies e 
              LEFT JOIN user_enemies ue ON e.id = ue.enemy_id AND ue.user_id = $user_id
              ORDER BY e.id ASC";

    $result = $mysqli->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - <?= isset($user) ? htmlspecialchars($user["username"]) : "Guest" ?></title>
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="../Common/contentStyle.css">
    <link rel="stylesheet" href="../Checklist/checklistStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" href="../Kepek/icon.jpg">
</head>
<body>
    <?php include '../Common/menu.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
    <div id="content">
        <?php if(isset($user)): ?>
            <h1 style="text-align: center; color: #3aafff;">Hunter's Journal</h1>
            <div class="progressContainer">
                <div class="progressText">
                    Journal Completion: <span id="percentText"><?= $percent ?></span>%
                    (<span id="countText"><?= $stats['found_count'] ?></span> / <?= $stats['total_enemies'] ?>)
                </div>
                <div class="progressBarBg">
                    <div id="progressBar" class="progressBarFill" style="width: <?= $percent ?>%;"></div>
                </div>
            </div>
            <hr>
            <div class="checklistContainer" style="max-height: 450px; overflow-y: auto; padding-right: 10px; margin-bottom: 20px">
                <div class="enemyGrid">
                    <?php while ($enemy = $result->fetch_assoc()): ?>
                        <div class="enemyCard <?= $enemy['is_discovered'] ? 'completed' : '' ?>" id="enemy-<?= $enemy['id'] ?>">
                            <label class="checkboxContainer">
                                <input type="checkbox" <?= $enemy['is_discovered'] ? 'checked' : '' ?> onchange="updateHunterJournal(<?= $enemy['id'] ?>, this.checked)">
                                <span class="checkmark"></span>
                            </label>
                            <div class="enemyInfo">
                                <h3><?= htmlspecialchars($enemy['name']) ?></h3>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <hr>
            <div class="userProfileCard">
                <div class="userAvatar">
                    <span><?= strtoupper(substr($user["username"], 0, 1)) ?></span>
                </div>
                <div class="userInfo">
                    <p class="welcomeText">Logged in as</p>
                    <h2 class="usernameText"><?= htmlspecialchars($user["username"]) ?></h2>
                </div>
                <div class="userActions">
                    <a href="logout.php" class="logoutBtn">Leave Hallownest</a>
                </div>
            </div>
        <?php else: ?>
            <h1>Welcome to Hallownest</h1>
            <p>Please <a href="../Login/login.php">Log in</a> or <a href="../Signup/signup.php">Sign up</a> to track your Hunter's Journal progress.</p>
        <?php endif; ?>
    </div>
    <script>
        function updateHunterJournal(enemyId, isChecked){
            const status = isChecked ? 1 : 0;
            const card = document.getElementById(`enemy-${enemyId}`);

            if(isChecked) card.classList.add('completed');
            else card.classList.remove('completed');

            fetch("../Checklist/saveProgress.php", {
                method: 'POST',
                headers: {'Content-Type' : 'application/x-www-form-urlencoded' },
                body: `enemy_id=${enemyId}&status=${status}`
            })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        document.getElementById('percentText').innerText = data.newPercent;
                        document.getElementById('countText').innerText = data.newCount;
                        document.getElementById('progressBar').style.width = data.newPercent + "%";
                    }
                })
                .catch(err => console.error("Error saving progress:", err));
        }
    </script>
    <script src="../Common/mapScript.js"></script>
</body>
</html>
