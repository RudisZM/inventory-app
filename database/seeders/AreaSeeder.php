<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'name' => 'kantor',
                'place_id' => 1,
            ],
            [
                'name' => 'gudang',
                'place_id' => 1,
            ],
            [
                'name' => 'kantor',
                'place_id' => 2,
            ],
            [
                'name' => 'gudang',
                'place_id' => 2,
            ],
            [
                'name' => 'gudang',
                'place_id' => 3,
            ],
            [
                'name' => 'taman 1',
                'place_id' => 4,
            ],
            [
                'name' => 'taman 2',
                'place_id' => 4,
            ],
            [
                'name' => 'taman 3',
                'place_id' => 4,
            ],
        ];

        foreach ($areas as $area) {
            \App\Models\Area::create($area);
        }
    }
}
