<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; #追記
use DateTime; #追記
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            
            'name'=>'masaki',
            'email'=>'masakihayase2407@gmail.com',
            'password'=> Hash::make('H7131msk1227'),
            ]);
            
    }
}