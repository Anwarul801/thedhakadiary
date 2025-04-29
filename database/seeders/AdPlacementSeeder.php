<?php

namespace Database\Seeders;

use App\Models\AdPlacement;
use Illuminate\Database\Seeder;

class AdPlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdPlacement::truncate();
        AdPlacement::insert([
            ['title' => 'পপআপ বিজ্ঞাপন', 'img_size' => '600px by 500px'],
            ['title' => 'উপরে মেনুর নিচে', 'img_size' => '970px by 90px'],
            ['title' => 'ডান পাশের বিজ্ঞাপন ১', 'img_size' => '300px by 250px'],
            ['title' => 'ডান পাশের বিজ্ঞাপন ২', 'img_size' => '300px by 250px'],
            ['title' => 'ডান পাশের বিজ্ঞাপন ৩', 'img_size' => '300px by 250px'],
            ['title' => 'ডান পাশের বিজ্ঞাপন ৪', 'img_size' => '300px by 250px'],
            ['title' => 'ফুল সেকশন বিজ্ঞাপন', 'img_size' => '970px by 250px'],
            ['title' => 'সেকশন এর মাঝখানে', 'img_size' => '600px by 500px'],
            ['title' => 'ফুটার বিজ্ঞাপন', 'img_size' => '970px by 90px'],
        ]);
    }
}
