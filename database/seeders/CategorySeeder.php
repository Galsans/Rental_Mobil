<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "id" => "d9afa434-c236-49f4-9ead-ad8bd081e8b5",
            'name' => 'Manual',
            'slug' => 'manual'
        ]);
        Category::create([
            "id" => "1ad9d3d6-2b58-42e2-92a5-5ffff755368e",
            'name' => 'Matic',
            'slug' => 'matic'
        ]);
    }
}
