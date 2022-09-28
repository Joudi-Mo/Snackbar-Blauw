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
                            -- `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
                            -- `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`)
                            `user`(`firstname`, `lastname`, `phonenumber`, `email`)
                            -- `user`(`firstname`, `lastname`, `email`, `role`)
                      VALUES ";

        for ($i = 0; $i < $number_of_records; $i++) {
            if ($i == $number_of_records - 1) {

                // $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->safeEmail()}')";
                $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->phoneNumber()}', '{$this->faker->safeEmail()}', '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}')";
                // $statement .= '("Peter","Van Dijk","987654321","peter@test.com","123")';
                // $statement .= "(
                //     '{$this->faker->firstName()}',
                //     '{$this->faker->lastName()}',
                //     '{$this->faker->phoneNumber()}',
                //     '{$this->faker->safeEmail()}',
                //     '{$this->faker->password()}'
                //     )"; 

                //Random number between 10000 and 50000
                // echo '<br>Range 10000 to 50000 --->'. rand(10000, 50000);


            } else {

                // $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->safeEmail()}'),";
                $statement .= "('{$this->faker->firstName()}', '{$this->faker->lastName()}', '{$this->faker->phoneNumber()}', '{$this->faker->safeEmail()}', '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'),";
                // $statement .= '("Peter","Van Dijk","987654321","peter@test.com","123"),';
                // $statement .= "(
                //     '{$this->faker->firstName()}',
                //     '{$this->faker->lastName()}',
                //     '{$this->faker->phoneNumber()}',
                //     '{$this->faker->safeEmail()}',
                //     '{$this->faker->password()}'
                // ),"; 
            }
        } //End for loop

        // $statement .= "(
        //     '{$this->faker->firstName()}',
        //     '{$this->faker->lastName()}',
        //     '{$this->faker->phoneNumber()}',
        //     '{$this->faker->safeEmail()}',
        //     '{$this->faker->password()}',
        //     '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])};

        //     // 'c''
        // ),"; 


        // $sql ='INSERT INTO 
        //         `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
        //     VALUES 
        //         ("Peter","Van Dijk","987654321","peter@test.com","123","Klant"),
        //         ("Jan","Van de Beek","123456789","jan@test.com","123","Medewerker"),
        //         ("Mark","Goot","0101010101","Mark@test.com","123","Manager")';

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
    
    
}

$seeder = new DbSeeder($conn);
// $seeder->fillUsers(3);
echo $seeder->randomPhoneNumber();
// echo '<button onclick ="$seeder->fillUsers(10);">FillUsers</button>';
?>