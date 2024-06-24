<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reviews')->delete();
        $faker = Faker::create();
        for($i = 0; $i<55; $i++) {
            Review::create([
                'reviewid' => $i+1,
                'bookid' => $faker->numberBetween(1, 50),
                'rating' => $faker->numberBetween(1, 5),
                'reviewText' => $faker->paragraph(1, true),

            ]);
        }
    }
}
