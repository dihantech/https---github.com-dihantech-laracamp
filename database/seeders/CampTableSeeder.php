<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Database\Seeder;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => 'Gila Belajar',
                'slug' => 'gila-belajar',
                'price' => 280,
                // 'created_at' => date('Y-m-d H:i:s', time()),
                // 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'title' => 'Baru Belajar',
                'slug' => 'baru-belajar',
                'price' => 180,
                // 'created_at' => date('Y-m-d H:i:s', time()),
                // 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

    // bisa juga seperti initial
    foreach ($camps as $key => $camp){
        Camp::create($camp);
        }
    // Camp::insert($camps);

    }
}
