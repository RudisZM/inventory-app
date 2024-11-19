<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attachmentCategories = [
            'office',
            'owner',
            'staff'
        ];
        foreach ($attachmentCategories as $attachmentCategory) {
            \App\Models\AttachmentCategory::create([
                'name' => $attachmentCategory
            ]);
        }
    }
}
