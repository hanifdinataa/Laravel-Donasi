<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Bencana Alam',
                'slug' => 'bencana-alam',
                'priority' => 1,
            ],
            [
                'name' => 'Galang Dana',
                'slug' => 'galang-dana',
                'priority' => 2,
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'priority' => 3,
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'priority' => 4,
            ],
            [
                'name' => 'Bantuan Sosial',
                'slug' => 'bantuan-sosial',
                'priority' => 5,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
