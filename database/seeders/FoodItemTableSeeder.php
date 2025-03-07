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
            ['id'=>1,'cook_id'=>'2','name'=>'Pizza','description'=>'Content coming soon','price'=>200,
            'image'=>'','status'=>'Available'],

            ['id'=>2,'cook_id'=>'3','name'=>'Burger','description'=>'Content coming soon','price'=>150,
            'image'=>'','status'=>'Available'],

            ['id'=>3,'cook_id'=>'2','name'=>'Noodles','description'=>'Content coming soon','price'=>180,
            'image'=>'','status'=>'Available'],

            ['id'=>4,'cook_id'=>'3','name'=>'Mexican rice','description'=>'Content coming soon','price'=>280,
            'image'=>'','status'=>'Available'],
        ];

        FoodItem::insert($foodItemsRecords);
    }
}
