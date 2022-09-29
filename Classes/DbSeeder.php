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
    

    //Functie om de 'Products' table in te vullen met data
    public function fillProducts()
    {
        $sql ='INSERT INTO 
                `products`(`name`, `cost_price`, `selling_price`, `category`)
            VALUES 
                ("Mayo","0.20","0.40","Saus"),
                ("Pindasaus","0.20","0.50","Saus"),
                ("Ketchup","0.30","0.60","Saus"),

                ("Shoarma (Lams)","4.50","6.50","Broodje"),
                ("Kebab","4.00","7.50","Broodje"),
                ("Pita Kaas Gezond","3.50","5.00","Broodje"),

                ("AA Drink","1.00","3","drinks"),
                ("Fanta Orange","2.00","3.50","drinks"),
                ("Coca-Cola","2.00","3.50","drinks")';

        mysqli_query($this->conn, $sql);
        print_r(mysqli_info($this->conn));
    }
    
}

$seeder = new DbSeeder($conn);
echo $seeder->randomPassword(8);
echo'<br>';
// $seeder->fillUsers(1,$seeder->randomPhoneNumber(), $seeder->randomPassword(8));
echo $seeder->randomPhoneNumber();