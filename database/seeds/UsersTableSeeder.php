<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
		   'level' => 'administrator',
            'created_at' => now(),
            'updated_at' => now()
        ]);

	  DB::table('users')->insert([
            'name' => 'Waiter',
            'email' => 'waiter@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
		   'level' => 'waiter',
            'created_at' => now(),
            'updated_at' => now()
        ]);

	   DB::table('users')->insert([
            'name' => 'Cashier',
            'email' => 'cashier@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
		   'level' => 'cashier',
            'created_at' => now(),
            'updated_at' => now()
        ]);
      
	  DB::table('users')->insert([
            'name' => 'Owner',
            'email' => 'owner@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
		   'level' => 'owner',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('genders')->insert([
            'gender_name' => 'Laki - Laki',
            'created_at' => now(),
            'updated_at' => now()
         ]);
      
         DB::table('genders')->insert([
            'gender_name' => 'Perempuan',
            'created_at' => now(),
            'updated_at' => now()
         ]); 

	}
}
