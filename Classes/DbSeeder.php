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

    //Functie om de 'user' table in te vullen met nep data
    public function fillUsers(int $number_of_records, $phoneNumber, $password)
    {

        $statement = "INSERT INTO 
                            `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)

                      VALUES ";

        for ($i = 0; $i < $number_of_records; $i++) {
            if ($i == $number_of_records - 1) {

                $statement .= 
                "(
                        '{$this->faker->firstName()}',
                        '{$this->faker->lastName()}',
                        '$phoneNumber',
                        '{$this->faker->safeEmail()}',
                        '$password',
                        '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'
                )";

            } else {

                $statement .= 
                "(
                    '{$this->faker->firstName()}',
                    '{$this->faker->lastName()}',
                    '$phoneNumber',
                    '{$this->faker->safeEmail()}',
                    '$password',
                    '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'
                ),"; 
            }
        } //End for loop

        mysqli_query($this->conn, $statement);
        print_r(mysqli_info($this->conn));
    }

    //Een random NL telefoonnummer genereren
    public function randomPhoneNumber(){
        $sequence = '06';
        for ($i = 0; $i < 8; ++$i) {
            $sequence .= mt_rand(0, 9);
        }
        return $sequence;
    }
    //Een random password genereren
    public function randomPassword($length){
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$#&";
        return substr(str_shuffle($characters), 0, $length);
    }
    
    
}

$seeder = new DbSeeder($conn);
echo $seeder->randomPassword(8);
echo'<br>';
// $seeder->fillUsers(1,$seeder->randomPhoneNumber(), $seeder->randomPassword(8));
echo $seeder->randomPhoneNumber();
