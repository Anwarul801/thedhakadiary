<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
           'name' => 'Admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make("00000000"),
           'phone_number' => "02020202020",
           'role_id' => 1,
        ],[
           'name' => 'Author',
           'email' => 'author@gmail.com',
           'password' => Hash::make("11111111"),
           'phone_number' => "02020202020",
           'role_id' => 1,
        ]);
    }
}
