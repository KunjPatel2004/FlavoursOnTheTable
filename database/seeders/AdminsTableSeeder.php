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
            ['id'=> 3,'name'=>'Jack','role'=>'Customer','mobile'=>9435687234,'email'=>'jack@gmail.com'
            ,'password'=>$password,'image'=>'','status'=>1], 
        ];

        Admin::insert($adminRecords);
    }
}
