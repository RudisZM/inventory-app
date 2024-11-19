<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsFlowTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goodsFlowTypes = [
            [
                'name' => 'inbound',
            ],
            [
                'name' => 'outbound',
            ],
            [
                'name' => 'change inventory',
            ],
            [
                'name' => 'split stock',
            ],
            [
                'name' => 'move to asset',
            ],
            [
                'name' => 'update stock',
            ],
            [
                'name' => 'peminjaman',
            ],
            [
                'name' => 'pengembalian',
            ],
        ];
        \App\Models\GoodsFlowType::insert($goodsFlowTypes);
    }
}
