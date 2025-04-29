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
           ['title' => "editor_name", 'value' => 'শফিউল আলম শাহীন'],
           ['title' => "address", 'value' => 'হাতিরপুল, কাটাবন, ঢাকা'],
           ['title' => "logo", 'value' => 'options/cMhiKWJHu8Emh3kbBOqmWNyAw9eoZs1SDPztuZED.png'],
            ['title' => "logo_for_mobile", 'value' => 'options/40grgDTe1UwFMKlOdVTj5DhY44r7yV3heF1zc7io.png'],
           ['title' => "favicon", 'value' => 'options/iLGE2sWrcdesSWNJT9i2dmpHkgK3fRJCF79Co2KK.png'],
           ['title' => "phone_1", 'value' => '01770444444'],
           ['title' => "phone_2", 'value' => '01770000000'],
           ['title' => "email", 'value' => 'default@gmail.com'],
           ['title' => "email_2", 'value' => 'default@gmail.com'],
           ['title' => "fb", 'value' => 'https://www.facebook.com/'],
           ['title' => "youtube", 'value' => 'https://www.youtube.com/'],
           ['title' => "twitter", 'value' => 'https://twitter.com/'],
           ['title' => "linkedin", 'value' => 'https://www.linkedin.com/'],
           ['title' => "telegram", 'value' => 'https://web.telegram.org/'],
           ['title' => "whats_app", 'value' => 'https://web.whatsapp.com/'],
           ['title' => "instagram", 'value' => 'https://www.instagram.com/'],
           ['title' => "footer_description", 'value' => 'DEFAULT'],
           ['title' => "shared_image", 'value' => 'options/cMhiKWJHu8Emh3kbBOqmWNyAw9eoZs1SDPztuZED.png'],
        ]);
    }
}
















