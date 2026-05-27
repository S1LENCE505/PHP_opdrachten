<?php
namespace App;
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "Robbe2009";
    private $dbname = "userrepo";

    public readonly PDO $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>