<?php
class Database
{
    public $host = 'localhost';
    public $dbuser = 'root';
    public $dbpass = '';
    public $dbname = 'snackbar_blauw';

    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->dbuser, $this->dbpass, $this->dbname);
    }

    public function getConnection()
    {
        return $this->conn;
    }
    public function makeUsersTable()
    {
        $sql = "CREATE TABLE User (
                    user_id int PRIMARY KEY AUTO_INCREMENT,
                    firstName varchar(100),
                    lastName varchar(100),
                    phonenumber int(10),
                    email varchar(100),
                    password varchar(60),
                    role ENUM ('Manager','Medewerker','Klant')
                );";
        $result = mysqli_query($this->conn, $sql);
    }
    public function makeOrdersTable()
    {
        $sql = "CREATE TABLE orders (
                    order_id int PRIMARY KEY AUTO_INCREMENT,
                    user_id int(11),
                    product_id int(11),
                    FOREIGN KEY (user_id) REFERENCES user(user_id),
                    FOREIGN KEY (product_id) REFERENCES products(product_id),
                    quantity int(11),
                    status ENUM ('Besteld','Verwerken','Bezorgd'),
                    due_datetime datetime   
                );";
        $result = mysqli_query($this->conn, $sql);
    }
    public function makeProductsTable()
    {
        $sql = "CREATE TABLE products (
                    product_id int PRIMARY KEY AUTO_INCREMENT,
                    name varchar(100),
                    cost_price decimal(8,2),
                    selling_price decimal(8,2),
                    category ENUM('drinks','food')	
                );";
        $result = mysqli_query($this->conn, $sql);
    }
}

$databaseConnection = new Database();
$conn = $databaseConnection->getConnection();

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
