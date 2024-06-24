<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // khoi tao doi tuong Faker
        $faker = Faker::create();
        // Chay vong lap xac dinh So ban ghi va kieu du lieu tu Faker
        for($i=0; $i<50; $i++) {
            Post::create([
                'title' => $faker->sentence(6, true),
                'body' => $faker->paragraphs(3, true)
            ]);
        }
    }
}
