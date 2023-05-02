<?php

namespace App\Database\Seeds;

use App\Models\Student as ModelsStudent;
use CodeIgniter\Database\Seeder;

class Student extends Seeder
{
    public function run()
    {
        $studentModel = new ModelsStudent();
        $faker = \Faker\Factory::create();
        $faker->seed(4312);

        for ($i = 0; $i < 200; $i++) {
            $gender = $faker->randomElement(array('L', 'P'));
            $studentModel->insert([
                'nis' => $faker->numberBetween(1000, 9999),
                'name' => $faker->name($gender == 'L' ? 'male' : 'female'),
                'gender' => $gender,
                'class' => $faker->randomElement(array('X A', 'X B', 'XI A', 'XI B', 'XII A', 'XII B')),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
            ]);
        }
    }
}
