<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<10; $i++) {
            User::create([
                'name' => $faker->userName,
                'email' => $faker->email,
                'email_verified_at' => $faker->date,
                'password' => '1234',
            ]);
        }
    }
}
