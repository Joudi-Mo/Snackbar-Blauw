<?php
require 'dbseed.php';
class User
{

    private $conn;

    private function query($sql){
        return mysqli_query($this->conn, $sql);
    }
    
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getSingle($id)
    {
        $sql = "SELECT * FROM USER where id = $id";
        return mysqli_fetch_assoc($this->query($sql));
    }
    public function getAll()
    {
        $sql = "SELECT * FROM USER";
        return mysqli_fetch_assoc($this->query($sql));
    }
}

$user = new User($conn);
$user->getSingle(1);