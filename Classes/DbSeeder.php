<?php
require 'Database.php';
require_once '../vendor/autoload.php';


class DbSeeder
{
    private $conn;
    private $faker;

    public function __construct($conn)
    {
        $this->faker = Faker\Factory::create();
        $this->conn = $conn;
    }

    public function fillUsers(int $number_of_records)
    {

        $statement = "INSERT INTO 
                                `user`(`firstname`, `lastname`, `email`)
                     VALUES ";

        // ("' . $this->faker->firstName() . '", "' . $this->faker->lastName() . ')" ;





        for ($i = 0; $i < $number_of_records; $i++) {
            if($i == $number_of_records - 1){

                $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->email()}')";
            }
            else{

                $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->email()}'),";
            }
        }

        // $state

        // $sql ='INSERT INTO 
        //         `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
        //     VALUES 
        //         ("Peter","Van Dijk","987654321","peter@test.com","123","Klant"),
        //         ("Jan","Van de Beek","123456789","jan@test.com","123","Medewerker"),
        //         ("Mark","Goot","0101010101","Mark@test.com","123","Manager")';

        mysqli_query($this->conn, $statement);

        print_r(mysqli_info($this->conn));
    }
}

$seeder = new DbSeeder($conn);
$seeder->fillUsers(10);
