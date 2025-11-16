<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil category IDs
        $menuUtama = Category::where('category_name', 'Menu Utama')->first();
        $minuman = Category::where('category_name', 'Minuman')->first();
        $topping = Category::where('category_name', 'Topping')->first();
        $dessert = Category::where('category_name', 'Dessert')->first();

        $menus = [
            // Menu Utama (Ramen)
            [
                'name' => 'Tonkotsu Ramen',
                'description' => 'Rich pork bone broth with chashu, green onions, and soft-boiled egg',
                'price' => 85000,
                'category_id' => $menuUtama->id,
                'image_url' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Shoyu Ramen',
                'description' => 'Clear soy sauce based broth with bamboo shoots and nori',
                'price' => 75000,
                'category_id' => $menuUtama->id,
                'image_url' => 'https://images.unsplash.com/photo-1591814468924-caf88d1232e1?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Miso Ramen',
                'description' => 'Fermented soybean paste broth with corn and butter',
                'price' => 80000,
                'category_id' => $menuUtama->id,
                'image_url' => 'https://images.unsplash.com/photo-1623341214825-9f4f963727da?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Spicy Miso Ramen',
                'description' => 'Spicy version of miso ramen with ground pork and chili oil',
                'price' => 85000,
                'category_id' => $menuUtama->id,
                'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Tantanmen Ramen',
                'description' => 'Japanese style sesame and chili soup with ground meat',
                'price' => 88000,
                'category_id' => $menuUtama->id,
                'image_url' => 'https://images.unsplash.com/photo-1617093727343-374698b1b08d?w=400&h=300&fit=crop',
                'is_available' => true
            ],

            // Minuman
            [
                'name' => 'Ramune Soda',
                'description' => 'Traditional Japanese carbonated soft drink',
                'price' => 25000,
                'category_id' => $minuman->id,
                'image_url' => 'https://images.unsplash.com/photo-1544145945-f90425340c7e?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Green Tea',
                'description' => 'Premium Japanese green tea served hot',
                'price' => 20000,
                'category_id' => $minuman->id,
                'image_url' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Iced Coffee',
                'description' => 'Cold brew coffee served with ice',
                'price' => 30000,
                'category_id' => $minuman->id,
                'image_url' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Sake',
                'description' => 'Traditional Japanese rice wine',
                'price' => 50000,
                'category_id' => $minuman->id,
                'image_url' => 'https://images.unsplash.com/photo-1553361371-9b22f78e8b1d?w=400&h=300&fit=crop',
                'is_available' => true
            ],

            // Topping
            [
                'name' => 'Extra Chashu',
                'description' => 'Additional braised pork belly slices',
                'price' => 15000,
                'category_id' => $topping->id,
                'image_url' => 'https://images.unsplash.com/photo-1623341214825-9f4f963727da?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Ajitsuke Egg',
                'description' => 'Marinated soft-boiled egg',
                'price' => 10000,
                'category_id' => $topping->id,
                'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Menma',
                'description' => 'Seasoned bamboo shoots',
                'price' => 8000,
                'category_id' => $topping->id,
                'image_url' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Corn',
                'description' => 'Sweet corn kernels',
                'price' => 5000,
                'category_id' => $topping->id,
                'image_url' => 'https://images.unsplash.com/photo-1591814468924-caf88d1232e1?w=400&h=300&fit=crop',
                'is_available' => true
            ],

            // Dessert
            [
                'name' => 'Mochi Ice Cream',
                'description' => 'Japanese rice cake with ice cream filling',
                'price' => 35000,
                'category_id' => $dessert->id,
                'image_url' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Dorayaki',
                'description' => 'Pancake sandwich with sweet red bean filling',
                'price' => 25000,
                'category_id' => $dessert->id,
                'image_url' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&h=300&fit=crop',
                'is_available' => true
            ],
            [
                'name' => 'Taiyaki',
                'description' => 'Fish-shaped pastry with sweet filling',
                'price' => 28000,
                'category_id' => $dessert->id,
                'image_url' => 'https://images.unsplash.com/photo-1551218808-94e220e084d2?w=400&h=300&fit=crop',
                'is_available' => true
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}