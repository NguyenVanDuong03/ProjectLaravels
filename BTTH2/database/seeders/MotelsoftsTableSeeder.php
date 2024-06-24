<?php

namespace Database\Seeders;

use App\Models\Motelsoft;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MotelsoftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<50; $i++) {
            $thoigiannhanphong = $faker->dateTimeBetween('-30 days', 'now');
            $sogiothue = $faker->numberBetween(1, 24);

            // Xác định đơn giá theo giờ dựa trên số giờ thuê
            if ($sogiothue >= 1 && $sogiothue <= 5) {
                $dongiatheogio = 2;
            } elseif ($sogiothue >= 6 && $sogiothue <= 12) {
                $dongiatheogio = 3;
            } else {
                $dongiatheogio = 4;
            }

            $thoigiantraphong = clone $thoigiannhanphong;
            $thoigiantraphong->add(new \DateInterval('PT' . $sogiothue . 'H'));

            Motelsoft::create([
                'id' => $i + 1,
                'maphong' => $faker->name(),
                'tenkhach' => $faker->userName(),
                'cccd' => $faker->numerify('023#####'),
                'thoigiannhanphong' => $thoigiannhanphong,
                'thoigiantraphong' => $thoigiantraphong,
                'sogiothue' => $sogiothue,
                'dongiatheogio' => $dongiatheogio,
                'tongtien' => $sogiothue * $dongiatheogio,
            ]);
        }
    }
}
