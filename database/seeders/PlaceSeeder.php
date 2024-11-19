<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            'BCM RD-20',
            'BCM RD-19',
            'Gudang',
            'Taman'
        ];
        foreach ($places as $place) {
            \App\Models\Place::create([
                'name' => $place
            ]);
        }
    }
}
