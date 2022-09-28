<?php
require 'dbseed.php';
class User
{

    private $conn;

    // private function query(){
    //     return $this->mysqli_query($this->conn, $sql);
    // }
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getSingle($id)
    {
        $sql = "SELECT * FROM USER where id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM USER";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
}

$user = new User($conn);
$user->getSingle(1);