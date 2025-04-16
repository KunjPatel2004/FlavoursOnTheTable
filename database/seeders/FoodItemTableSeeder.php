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
            ['id'=>37,'cook_id'=>'12','name'=>'Shahi Paneer','description'=>'Cottage cheese in a creamy, rich cashew-tomato gravy','price'=>200,
            'image'=>'','status'=>'Available'],

            ['id'=>38,'cook_id'=>'12','name'=>'Kadai Paneer','description'=>'Spicy paneer cooked with capsicum and onion in a thick gravy','price'=>240,
            'image'=>'','status'=>'Available'],

            ['id'=>39,'cook_id'=>'12','name'=>'Palak Paneer','description'=>'Soft paneer cubes in a spinach-based gravy','price'=>240,
            'image'=>'','status'=>'Available'],

            ['id'=>40,'cook_id'=>'12','name'=>'Baingan Bharta','description'=>'Smoked mashed eggplant cooked with onions, tomatoes, and spices','price'=>190,
            'image'=>'','status'=>'Available'],

            ['id'=>41,'cook_id'=>'12','name'=>'Chana Masala','description'=>'Spicy chickpea curry with a thick, flavorful gravy','price'=>240,
            'image'=>'','status'=>'Available'],

            ['id'=>42,'cook_id'=>'12','name'=>'Aloo Gobi','description'=>'Stir-fried potatoes and cauliflower with Indian spices','price'=>200,
            'image'=>'','status'=>'Available'],

            ['id'=>43,'cook_id'=>'12','name'=>'Tandoori Roti','description'=>'Whole wheat roti cooked in a clay oven (tandoor)','price'=>30,
            'image'=>'','status'=>'Available'],

            ['id'=>44,'cook_id'=>'12','name'=>'Butter Roti','description'=>'Soft whole wheat roti brushed with butter','price'=>28,
            'image'=>'','status'=>'Available'],

            ['id'=>45,'cook_id'=>'12','name'=>'Bajra Roti','description'=>'Roti made from pearl millet flour, nutritious and hearty','price'=>35,
            'image'=>'','status'=>'Available'],

            ['id'=>46,'cook_id'=>'12','name'=>'Methi Thepla','description'=>'Roti infused with fresh fenugreek leaves and spices','price'=>18,
            'image'=>'','status'=>'Available'],

            ['id'=>47,'cook_id'=>'12','name'=>'Lachha Paratha','description'=>'Layered, flaky, and crispy paratha','price'=>50,
            'image'=>'','status'=>'Available'],

            ['id'=>48,'cook_id'=>'12','name'=>'Butter Naan','description'=>'Classic naan brushed with butter for extra flavor','price'=>50,
            'image'=>'','status'=>'Available'],        
        ];

        FoodItem::insert($foodItemsRecords);
    }
}
