<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $camps = [
            [
                'title' =>  'Gila Belajar',
                'slug' => Str::slug('Gila Belajar'),
                'price' => 500000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'title' =>  'Baru Belajar',
                'slug' => Str::slug('Baru Belajar'),
                'price' => 300000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];
        // 1 Methode
        // foreach ($camps as $key => $camp) {
        //     Camp::create($camp);
        // }
        // 2 Methode
        Camp::insert($camps);
    }
}
