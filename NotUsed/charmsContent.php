<?php
/* for now, I won't use this */
$mysqli = require dirname(__DIR__) . "/Server/database.php";
$charmresult = $mysqli->query("SELECT * FROM charms ORDER BY name ASC");

?>

    <div id="charmsContainer">
        <?php while($row=$charmresult->fetch_assoc()): ?>
            <div class="charmCard" onclick="showDetails(
                '<?= htmlspecialchars($row['name']) ?>',
                '<?= htmlspecialchars($row['description']) ?>',
                '<?= htmlspecialchars($row['location']) ?>',
                '<?= htmlspecialchars($row['category']) ?>',
                '../Kepek/Charms/<?= $row['imagePath'] ?>',
                '<?= $row['notches'] ?>'
                )">
                <img src="../Kepek/Charms/<?= $row['imagePath'] ?>">
            </div>
        <?php endwhile; ?>
    </div>

    <div id="charmModal" class="modal" onclick="closeModal()">
        <div class="modalContent" onclick="event.stopPropagation()">
            <span class="closeButton" onclick="closeModal()">&times;</span>
            <img id="modalImg">
            <h2 id="modalName"></h2>
            <p id="modalDescription"></p>
            <p id="modalLocation"></p>
            <p id="modalCategory"></p>
            <p id="modalNotches"></p>
        </div>
    </div>
