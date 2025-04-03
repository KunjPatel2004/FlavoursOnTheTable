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
            ['id'=>13,'cook_id'=>'2','name'=>'Pav Bhaji','description'=>'A thick vegetable curry served with buttered bread rolls','price'=>150,
            'image'=>'','status'=>'Available'],

            ['id'=>14,'cook_id'=>'2','name'=>'Paneer Tikka','description'=>'Content coming soon','price'=>480,
            'image'=>'','status'=>'Available'],

            ['id'=>15,'cook_id'=>'2','name'=>'Dal Makhani','description'=>'Content coming soon','price'=>160,
            'image'=>'','status'=>'Available'],

            ['id'=>16,'cook_id'=>'2','name'=>'Chole Bhature','description'=>'Content coming soon','price'=>280,
            'image'=>'','status'=>'Available'],

            ['id'=>17,'cook_id'=>'2','name'=>'Tandoori Naan','description'=>'Naan cooked in a tandoor,giving it a smoky falvor','price'=>50,
            'image'=>'','status'=>'Available'],

            ['id'=>18,'cook_id'=>'2','name'=>'Garlic Naan','description'=>'Naan infused with garlic and coriander','price'=>60,
            'image'=>'','status'=>'Available'],
            
            ['id'=>19,'cook_id'=>'2','name'=>'Plain Naan','description'=>'Soft and fluffy traditional Indian bread from refined flour','price'=>30,
            'image'=>'','status'=>'Available'],
            
            ['id'=>20,'cook_id'=>'2','name'=>'Aloo Paratha','description'=>'A stuffed wheat flatbread with spiced mashed potatoes, served with butter or curd','price'=>200,
            'image'=>'','status'=>'Available'],

            ['id'=>21,'cook_id'=>'2','name'=>'Chaas(Buttermilk)','description'=>'A cool, yogurt-based drink','price'=>40,
            'image'=>'','status'=>'Available'],

            ['id'=>22,'cook_id'=>'2','name'=>'Sweet Lassi','description'=>'A thick, sweet yogurt-based drink','price'=>60,
            'image'=>'','status'=>'Available'],
        ];

        FoodItem::insert($foodItemsRecords);
    }
}
