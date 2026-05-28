
// namespace App;
// class Database
<?php
$servername = "localhost";
$username = "root";
$password = "Robbe2009";
$dbname = "userrepo";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

//     public function __construct()
//     {
//         try {
//             $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch(PDOException $e) {
//             echo "Connection failed: " . $e->getMessage();
//         }
//     }
// 