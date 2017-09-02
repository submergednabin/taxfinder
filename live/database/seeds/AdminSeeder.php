<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        	'first_name'=>'Raju',
        	'last_name'=>'Raj',
        	'username'=>'admin',
        	'email'=>'admin@admin.com',
        	'password'=>Hash::make('password'),
        	'mobile'=>'9839293222',
        ];

        \App\Admin::insert($admin);
    }
}
