<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords=[
            ['id'=> 1,'name'=>'Kunj','role'=>'Admin','mobile'=>1324534567,'email'=>'kunj@gmail.com'
            ,'password'=>$password,'image'=>'','home_address'=>'Gurukul Road Memnagar Ahmedabad','status'=>1],

            ['id'=> 2,'name'=>'John','role'=>'Cook','mobile'=>9435687234,'email'=>'john_cook@gmail.com'
            ,'password'=>$password,'image'=>'','home_address'=>'Naroda Ahmedabad','status'=>1],

            ['id'=> 3,'name'=>'Jack','role'=>'Customer','mobile'=>8126364748,'email'=>'jack@gmail.com'
            ,'password'=>$password,'image'=>'','home_address'=>'Vasna Ahmedabad','status'=>1],
            
            ['id'=> 4,'name'=>'Bob','role'=>'customer','mobile'=>9203648564,'email'=>'bob01@gmail.com'
            ,'password'=>$password,'image'=>'','home_address'=>'Gurukul Road Memnagar Ahmedabad','status'=>1],

            ['id'=> 5,'name'=>'Alice','role'=>'Cook','mobile'=>7869547374,'email'=>'Alice@gmail.com'
            ,'password'=>$password,'image'=>'','home_address'=>'Naroda Ahmedabad','status'=>1],

            ['id'=> 6,'name'=>'Paul','role'=>'Customer','mobile'=>8374659697,'email'=>'paul19@gmail.com'
            ,'password'=>$password,'image'=>'','home_address'=>'Vasna Ahmedabad','status'=>1] 
        ];

        Admin::insert($adminRecords);
    }
}
