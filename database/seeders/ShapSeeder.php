<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shaps = [
            [
                'name' => 'Shap 1',
                'rak_id' => 1,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 1,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 2,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 2,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 3,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 3,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 4,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 4,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 5,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 5,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 6,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 6,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 7,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 7,
            ],
            [
                'name' => 'Shap 1',
                'rak_id' => 8,
            ],
            [
                'name' => 'Shap 2',
                'rak_id' => 8,
            ],
        ];
        foreach ($shaps as $shap) {
            \App\Models\Shap::create($shap);
        }
    }
}
