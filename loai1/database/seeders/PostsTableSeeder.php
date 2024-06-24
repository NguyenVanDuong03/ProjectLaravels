<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<50; $i++) {
            Post::create([
                'post_id' => $i+1,
                'post_Name' => $faker->name(),
                'gender' => $faker->randomElement(['Nam', 'Nữ', 'Bí mật']),
                'birthday' => $faker->date(),
                'image' => $faker->imageUrl($width = 100, $height = 100),
                'phone' => $faker->numerify('09########'),
            ]);
        }
    }
}
