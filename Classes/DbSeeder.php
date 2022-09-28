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

    public function fillUsers(int $number_of_records, $phoneNumber, $password)
    {

        $statement = "INSERT INTO 
                            `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
                            -- `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`)
                            -- `user`(`firstname`, `lastname`, `phonenumber`, `email`)

                      VALUES ";

        for ($i = 0; $i < $number_of_records; $i++) {
            if ($i == $number_of_records - 1) {

                // $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->safeEmail()}')";
                $statement .= 
                "(
                        '{$this->faker->firstName()}',
                        '{$this->faker->lastName()}',
                        '$phoneNumber',
                        '{$this->faker->safeEmail()}',
                        '$password',
                        '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'
                )";
                // $statement .= '("Peter","Van Dijk","987654321","peter@test.com","123")';
                // $statement .= "(
                //     '{$this->faker->firstName()}',
                //     '{$this->faker->lastName()}',
                //     '{$this->faker->phoneNumber()}',
                //     '{$this->faker->safeEmail()}',
                //     '{$this->faker->password()}'
                //     )"; 

            } else {

                // $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->safeEmail()}'),";
                // $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->phoneNumber()}', '{$this->faker->safeEmail()}', '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'),";
                // $statement .= '("Peter","Van Dijk","987654321","peter@test.com","123"),';
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

        // $statement .= "(
        //     '{$this->faker->firstName()}',
        //     '{$this->faker->lastName()}',
        //     '{$this->faker->phoneNumber()}',
        //     '{$this->faker->safeEmail()}',
        //     '{$this->faker->password()}',
        //     '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])};
        // ),"; 

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
// echo $seeder->randomPassword(8);
$seeder->fillUsers(1,$seeder->randomPhoneNumber(), $seeder->randomPassword(8));
// echo $seeder->randomPhoneNumber();
// echo '<button onclick ="$seeder->fillUsers(10);">FillUsers</button>';
?>