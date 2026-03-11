<?php
 
 require_once 'db.php';


$stmt = $conn->prepare("INSERT INTO messages (author, message) VALUES (?, ?)");

$author = $_POST['author'];
$message = $_POST['message'];

$stmt->bindvalue(1, $author);
$stmt->bindvalue(2, $message);
$stmt->execute();



header("location: index.php");
?>  