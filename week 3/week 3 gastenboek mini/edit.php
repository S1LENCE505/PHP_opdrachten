<?php
require_once 'db.php';

$id = (int) $_POST['id'];
$tekst = $_POST['message'];

$stmt = $conn->prepare('UPDATE messages SET message = :message WHERE id = :id');
$stmt->execute([$tekst, $id]);

$stmt ->execute([
    ':message' => $tekst,
    ':id' => $id,
]);

header("location: index.php");
?>