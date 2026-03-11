<?php

require_once 'db.php';

$rijen = [];

if (empty($_GET['Author'])) {
    $stmt = $conn->prepare("SELECT * FROM messages");
    $stmt->execute();
} else {
    $stmt = $conn->prepare("SELECT * FROM messages WHERE Author = ?");
    $stmt->execute([$_GET['Author']]);
}

$rijen = $stmt->fetchAll();

?>
