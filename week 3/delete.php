<?php
require_once 'db.php';


$stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
$stmt->execute([$_GET['id']]);
$stmt->execute();

header("location: index.php");
?>