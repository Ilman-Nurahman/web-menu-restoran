<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Menu Utama'],
            ['category_name' => 'Minuman'],
            ['category_name' => 'Topping'],
            ['category_name' => 'Dessert'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}