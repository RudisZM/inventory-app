<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutboundTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outboundTypes = [
            [
                'name' => 'kantor',
            ],
            [
                'name' => 'angkringan',
            ],
            [
                'name' => 'pribadi',
            ],
            [
                'name' => 'jual',
            ],
        ];
        foreach ($outboundTypes as $outboundType) {
            \App\Models\OutboundType::create($outboundType);
        }
    }
}
