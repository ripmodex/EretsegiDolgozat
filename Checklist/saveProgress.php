<?php

ob_start();
session_start();
header('Content-Type: application/json');
$mysqli = require dirname(__DIR__) . '/Server/database.php';

if(!isset($_SESSION['user_id'])){
    ob_clean();
    echo json_encode(['success' => false]);
    exit;
}

$user_id = $_SESSION['user_id'];
$enemy_id = (int)$_POST['enemy_id'];
$status = (int)$_POST['status'];

$stmt = $mysqli->prepare("
    INSERT INTO user_enemies (user_id, enemy_id, is_discovered)
    VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE is_discovered = VALUES(is_discovered)");
$stmt->bind_param("iii", $user_id, $enemy_id, $status);
$stmt->execute();

$statsResult = $mysqli->query("
    SELECT COUNT(*) as total,
           SUM(CASE WHEN ue.is_discovered = 1 THEN 1 ELSE 0 END) as found
           FROM enemies e
           LEFT JOIN user_enemies ue ON e.id = ue.enemy_id AND ue.user_id = $user_id");
$stats = $statsResult->fetch_assoc();
$newPercent = ($stats['total'] > 0) ? round(($stats['found'] / $stats['total']) * 100) : 0;

ob_clean();
header('Content-Type: application/json');

echo json_encode([
    'success' => true,
    'newCount' => $stats['found'],
    'newPercent' => $newPercent
]);
exit;