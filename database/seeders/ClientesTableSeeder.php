<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void
    {
        $faker = Factory::create('pt_BR');

        for($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            Cliente::create([
                'id' =>  Str::random(10), 
                'nome'=> $faker->firstName($gender).' '. $faker->lastName($gender),
                'cpf' => $faker->cpf,
                'dataNascimento' => $faker->date( $format = 'Y-m-d', $max = 'now'),
                'endereco' => $faker->streetName,
                'estado' => $faker->state,
                'cidade' => $faker->city,
                'sexo' => $gender, 
                'created_at' => now()
            ]);
        }
    }
}
