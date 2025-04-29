<?php

namespace Database\Seeders;

use App\Models\Marque;
use Illuminate\Database\Seeder;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marque::truncate();
        Marque::insert([
           ['type' => 'Active']
        ]);
    }
}
