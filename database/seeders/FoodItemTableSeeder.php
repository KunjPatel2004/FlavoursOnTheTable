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
            ['id'=>1,'cook_id'=>'2','name'=>'Pizza','description'=>'Content is coming soon','price'=>200,
            'image'=>'','status'=>'Available','actions'=>1],
        ];

        FoodItem::insert($foodItemsRecords);
    }
}
