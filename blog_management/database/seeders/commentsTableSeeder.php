<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class commentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<50; $i++) {
            Comment::create([
                'comment_id' => $i+1,
                'post_id' => $faker->numberBetween(1, 10),
                'comment' => $faker->paragraph(1, true),
            ]);
        }
    }
}
