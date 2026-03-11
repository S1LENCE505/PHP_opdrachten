<?php
$servername = "localhost";
$dbname = "messages_db";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    echo "database connection successful";
}catch(PDOException $ex){
    $ex->getMessage();
}

$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
$messages = $result->fetch_all();
foreach($messages as $message){
    echo "message id is ". $message['id']. "<br>";
    echo "message author is ". $message['author']. "<br>";
    echo "message content is ". $message['content']. "<br>". "<br>";
}
?>