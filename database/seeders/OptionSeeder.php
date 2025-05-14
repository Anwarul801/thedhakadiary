<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::truncate();
        Option::insert([
           ['title' => "site_title", 'value' => 'DEFAULT'],
           ['title' => "slogan", 'value' => 'DEFAULT'],
           ['title' => "editor_name", 'value' => 'রুহুল আমিন'],
           ['title' => "editor_name_en", 'value' => 'Ruhul Amin'],
           ['title' => "address", 'value' => '৪৮/১, পুরানা পল্টন, ঢাকা-১০০০, বাংলাদেশ।'],
           ['title' => "address_en", 'value' => '48/1, Purana Paltan, Dhaka-1000, Bangladesh.'],
           ['title' => "logo", 'value' => 'options/cMhiKWJHu8Emh3kbBOqmWNyAw9eoZs1SDPztuZED.png'],
           ['title' => "favicon", 'value' => 'options/iLGE2sWrcdesSWNJT9i2dmpHkgK3fRJCF79Co2KK.png'],
           ['title' => "phone_1", 'value' => '01770444444'],
           ['title' => "phone_2", 'value' => '01770000000'],
           ['title' => "email", 'value' => 'default@gmail.com'],
           ['title' => "email_2", 'value' => 'default@gmail.com'],
           ['title' => "fb", 'value' => 'https://www.facebook.com/'],
           ['title' => "twitter", 'value' => 'https://twitter.com/'],
           ['title' => "telegram", 'value' => 'https://web.telegram.org/'],
           ['title' => "whats_app", 'value' => '8801747200000'],
           ['title' => "instagram", 'value' => 'https://www.instagram.com/'],
           ['title' => "shared_image", 'value' => 'options/cMhiKWJHu8Emh3kbBOqmWNyAw9eoZs1SDPztuZED.png'],
        ]);
    }
}
















