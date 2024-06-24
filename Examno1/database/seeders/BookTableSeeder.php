<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create();
        for($i = 0; $i<50; $i++) {
            Book::create([
                'bookid' => $i+1,
                'title' => $faker->sentence(1, true),
                'author' => $faker->userName(),
                'genre' => $faker->sentence(1, true),

            ]);
        }
    }
}
