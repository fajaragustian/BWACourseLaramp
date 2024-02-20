<?php

namespace Database\Seeders;

use App\Models\CampBenetfit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampBenetfitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $campbenetfits = [
            [
                'camp_id' => 1,
                'name' => '1.Belajar Seo Dengan baik',
            ],
            [
                'camp_id' => 1,
                'name' => '2.Mastering Seo Dengan baik dan mudah',
            ],
            [
                'camp_id' => 1,
                'name' => '3.Mastering Seo Dengan baik dan mudah',
            ],
            [
                'camp_id' => 1,
                'name' => '4.Mastering Seo Dengan baik dan mudah',
            ],
            [
                'camp_id' => 2,
                'name' => '1.Belajar Seo Dengan baik',
            ],
            [
                'camp_id' => 2,
                'name' => '2.Mastering Seo Dengan baik dan mudah',
            ],
            [
                'camp_id' => 2,
                'name' => '3.Mastering Seo Dengan baik dan mudah',
            ],
            [
                'camp_id' => 2,
                'name' => '4.Mastering Seo Dengan baik dan mudah',
            ],

        ];
        CampBenetfit::insert($campbenetfits);
    }
}
