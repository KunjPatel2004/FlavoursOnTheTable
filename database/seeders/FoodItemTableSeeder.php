<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FoodItem;

class FoodItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodItemsRecords=[
            ['id'=>8,'cook_id'=>'2','name'=>'Chicken Lasagna','description'=>'Content coming soon','price'=>450,
            'image'=>'','status'=>'Available'],

            ['id'=>9,'cook_id'=>'7','name'=>'BBQ Chicken Pizza','description'=>'Content coming soon','price'=>480,
            'image'=>'','status'=>'Available'],

            ['id'=>10,'cook_id'=>'7','name'=>'Chicken Sweet Corn Soup','description'=>'Content coming soon','price'=>160,
            'image'=>'','status'=>'Available'],

            ['id'=>11,'cook_id'=>'8','name'=>'Mexican rice','description'=>'Content coming soon','price'=>280,
            'image'=>'','status'=>'Available'],

            ['id'=>12,'cook_id'=>'8','name'=>'Chilli Panner','description'=>'Content coming soon','price'=>200,
            'image'=>'','status'=>'Available'],
        ];

        FoodItem::insert($foodItemsRecords);
    }
}
