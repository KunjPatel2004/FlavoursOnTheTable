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
        $password = Hash::make('john');
        $adminRecords=[
            ['id'=> 2,'name'=>'John','role'=>'Cook','mobile'=>9374588293,'email'=>'john_cook@gmail.com'
            ,'password'=>$password,'image'=>'','status'=>1],   
        ];

        Admin::insert($adminRecords);
    }
}
