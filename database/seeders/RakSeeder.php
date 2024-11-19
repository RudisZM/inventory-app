<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raks = [
            [
                'name' => 'etalase 1',
                'area_id' => 1,
            ],
            [
                'name' => 'Rak 1',
                'area_id' => 1,
            ],
            [
                'name' => 'etalase 2',
                'area_id' => 2,
            ],
            [
                'name' => 'Rak 2',
                'area_id' => 2,
            ],
            [
                'name' => 'Rak 3',
                'area_id' => 3,
            ],
            [
                'name' => 'Rak 4',
                'area_id' => 4,
            ],
            [
                'name' => 'Rak 5',
                'area_id' => 4,
            ],
            [
                'name' => 'Rak 6',
                'area_id' => 4,
            ],
        ];

        foreach ($raks as $rak) {
            \App\Models\Rak::create($rak);
        }
    }
}
