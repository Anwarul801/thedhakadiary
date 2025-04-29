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
           'phone_number' => "01747280061",
           'role_id' => 1,
        ]);
    }
}
