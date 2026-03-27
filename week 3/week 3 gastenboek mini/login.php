<?php
require_once 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user_id = $_POST['user_id'];
$hash = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $hash)) {
    session_start();
}





$_SESSION['user'] = $user_id;
$_SESSION['user_id'] = $user_id;
?>