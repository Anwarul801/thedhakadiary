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
            ['title' => 'Homepage Top 1', 'img_size' => '984px by 120px'],
            ['title' => 'Homepage Side 2', 'img_size' => '315px by 232px'],
            ['title' => 'Homepage between sections 3', 'img_size' => '984px by 120px'],
            ['title' => 'Homepage between sections 4', 'img_size' => '984px by 120px'],
            ['title' => 'Homepage between sections 5', 'img_size' => '984px by 120px'],
            ['title' => 'Homepage Footer 6', 'img_size' => '984px by 120px'],
            ['title' => 'Category Page Top', 'img_size' => '984px by 120px'],
            ['title' => 'News Details Page Side 1', 'img_size' => '315px by 232px'],
            ['title' => 'News Details Page Side 2', 'img_size' => '315px by 232px'],
            ['title' => 'News Details Page Side 3', 'img_size' => '315px by 232px'],
            ['title' => 'About Us Page Side 1', 'img_size' => '315px by 232px'],
            ['title' => 'About Us Page Side 2', 'img_size' => '315px by 232px'],
            ['title' => 'AuthorMiddleware Page Side 1', 'img_size' => '315px by 232px'],
            ['title' => 'Terms & Privacy Page Side 1', 'img_size' => '315px by 232px'],
            ['title' => 'Photo Details Page Side 1', 'img_size' => '315px by 232px'],
        ]);
    }
}
