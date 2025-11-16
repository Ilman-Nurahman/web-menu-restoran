<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Buat 25 sample orders untuk testing pagination
        for ($i = 1; $i <= 25; $i++) {
            // Buat order dulu tanpa total_amount
            $order = Order::create([
                'customer_name' => $faker->name(),
                'customer_phone' => $faker->phoneNumber(),
                'table_number' => $faker->numberBetween(1, 20),
                'total_amount' => 0, // sementara 0, akan diupdate nanti
                'notes' => $faker->optional()->sentence(),
                'status' => $faker->randomElement(['pending', 'completed']),
                'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
                'updated_at' => now()
            ]);

            // Buat 1-4 order items per order
            $itemCount = $faker->numberBetween(1, 4);
            $totalAmount = 0;
            
            for ($j = 1; $j <= $itemCount; $j++) {
                $menuPrice = $faker->numberBetween(15000, 45000);
                $quantity = $faker->numberBetween(1, 3);
                $subtotal = $menuPrice * $quantity;
                $totalAmount += $subtotal;
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_name' => $faker->randomElement([
                        'Ramen Ayam Pedas',
                        'Ramen Sapi Original', 
                        'Ramen Seafood',
                        'Ramen Vegetarian',
                        'Gyoza Ayam',
                        'Takoyaki',
                        'Chicken Karaage'
                    ]),
                    'menu_image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=300',
                    'menu_price' => $menuPrice,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal
                ]);
            }
            
            // Update total_amount setelah semua items dibuat
            $order->update(['total_amount' => $totalAmount]);
        }
    }
}