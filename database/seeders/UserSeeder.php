<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Utsab Pokharel',
            'email' => 'imutsabpokharel@gmail.com',
            'password' => bcrypt('admin@123'),
            'role' => '1',
            'status' => '1',
            'contact' => '9862043408',
            'address' => '',
            'gender' => 'Male',
            'degree' => '',
            'dob' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
