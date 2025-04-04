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
            ['id'=>23,'cook_id'=>'7','name'=>'Margherita Pizza','description'=>'Classic pizza with fresh tomato sauce, mozzarella, and basil','price'=>180,
            'image'=>'','status'=>'Available'],

            ['id'=>24,'cook_id'=>'7','name'=>'Chicken Tikka Pizza','description'=>'Tandoori chicken pieces with onions and capsicum','price'=>270,
            'image'=>'','status'=>'Available'],

            ['id'=>25,'cook_id'=>'7','name'=>'Grilled Peri Peri Chicken Burger','description'=>'Spicy peri-peri marinated grilled chicken burger','price'=>160,
            'image'=>'','status'=>'Available'],

            ['id'=>26,'cook_id'=>'7','name'=>'Cheese Burst Veg Burger','description'=>'A crunchy veggie patty stuffed with molten cheese','price'=>130,
            'image'=>'','status'=>'Available'],

            ['id'=>27,'cook_id'=>'7','name'=>'Paneer Tikka Burger','description'=>'Grilled paneer with spicy mayo and veggies in a toasted bun','price'=>140,
            'image'=>'','status'=>'Available'],

            ['id'=>28,'cook_id'=>'7','name'=>'Cheese Burst Pizza','description'=>'An extra-cheesy pizza with a molten cheese-filled crust','price'=>250,
            'image'=>'','status'=>'Available'],
            
        ];

        FoodItem::insert($foodItemsRecords);
    }
}
