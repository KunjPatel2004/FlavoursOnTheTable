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
            ['id'=> 1,'name'=>'Kunj','role'=>'Admin','mobile'=>9327383190,'email'=>'kunj@gmail.com'
            ,'password'=>'Kunj@2004','image'=>'','home_address'=>'Gurukul Road Memnagar Ahmedabad','status'=>1],

            ['id'=> 2,'name'=>'John','role'=>'cook','mobile'=>9435687234,'email'=>'john_cook@gmail.com'
            ,'password'=>'John@312','image'=>'','home_address'=>'Naroda Ahmedabad','status'=>1],

            ['id'=> 3,'name'=>'Jay','role'=>'cook','mobile'=>8126364748,'email'=>'jay765@gmail.com'
            ,'password'=>'Jaypatel@221','image'=>'','home_address'=>'Vasna Ahmedabad','status'=>1],
            
            ['id'=> 4,'name'=>'Sam','role'=>'cook','mobile'=>9203648564,'email'=>'sam_cook132@gmail.com'
            ,'password'=>'Sam@123','image'=>'','home_address'=>'Gurukul Road Memnagar Ahmedabad','status'=>1],

            ['id'=> 5,'name'=>'Anki','role'=>'cook','mobile'=>7869547374,'email'=>'anki@gmail.com'
            ,'password'=>'Ankipatel@27','image'=>'','home_address'=>'Naroda Ahmedabad','status'=>1],

            ['id'=> 6,'name'=>'Ajay','role'=>'cook','mobile'=>8374659697,'email'=>'ajay_cook@gmail.com'
            ,'password'=>'Ajay@123','image'=>'','home_address'=>'Vasna Ahmedabad','status'=>1] 
        ];

        Admin::insert($adminRecords);
    }
}
