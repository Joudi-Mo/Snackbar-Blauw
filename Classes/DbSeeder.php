<?php
require 'Database.php';
require_once '../vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
// 'Vince Sporer'
echo $faker->email();
// 'walter.sophia@hotmail.com'
echo $faker->text();
// 'Numquam ut mollitia at consequuntur inventore dolorem.'

class DbSeeder
{
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function fillUsers(){

        $statement = 'INSERT INTO 
                    `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
                    VALUES ';
        for ($i=0; $i < 10; $i++) { 
            $statement .= ("Peter","Van Dijk","123456789","peter@test.com","123","Klant");
        }
        $sql ='INSERT INTO 
                `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
            VALUES 
                ("Peter","Van Dijk","987654321","peter@test.com","123","Klant"),
                ("Jan","Van de Beek","123456789","jan@test.com","123","Medewerker"),
                ("Mark","Goot","0101010101","Mark@test.com","123","Manager")';
        
        mysqli_query($this->conn, $sql);

    }
}