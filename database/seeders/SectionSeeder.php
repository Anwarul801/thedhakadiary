<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::truncate();
        Section::insert([
            ['title' => 'Home News', 'status' => 'Active' , 'order' => 1],
        ]);
    }
}
