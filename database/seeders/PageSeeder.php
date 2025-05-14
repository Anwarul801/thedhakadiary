<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        Page::insert([
            [
                'name' => 'আমাদের সম্পর্কে',
                'name_en' => 'About Us',
                'slug' => 'about-page',
                'description' => "The Dhaka Diary is an online news portal that aims to provide accurate and objective news and views for the audience across the country. With the slogan of ‘ বস্তুনিষ্ঠতা আমাদের প্রাধান্য’, the online news portal started its journey on 24 June 2023. On May 22, 2022, thedhakadiary.com got registered as an online media by the Ministry of Information and Broadcasting, Government of the People's Republic of Bangladesh.
The Dhaka Diary puts an extra emphasis on national news and news from every district. However, it also covers different segments like politics, economics, international, sports, entertainment, education, information and technology, features, lifestyle, and columns.
This online is different and unique than other online news portals because it practices ‘multimedia’ journalism, which provides readers news of home and abroad along with audio, video, infographic, and web story.
S. Shain, Editor of The Dhaka Diary, is a very prominent face in the field of the country’s journalism sector for more than 10 years.
Powered by a group of young, enthusiastic, and experienced journalists, The Dhaka Diary prioritizes on the storytelling pattern of the news to guide its readers to understand the most complicated issues easily.
Objective
The Dhaka Diary aims to provide the most updated news to its readers within the shortest possible time. In this journey to provide news quickly, The Dhaka Diary always tries to be accurate, objective and unbiased.
Following the basic fundamental principles of the Bangladesh constitution, The Dhaka Diary aims to strengthen public opinion in favor of the liberation war.
The Dhaka Diary is committed to the fundamental values of the country, especially, national sovereignty, democracy and secularism. In addition, The Dhaka Diary will speak for the human and civil rights of the citizen of the country.",
                'description_en' => 'Same as description',
                'order' => 1,
                'deletable' => 0
            ],
            [
                'name' => 'গোপনীয়তার নীতি',
                'name_en' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'description' => 'Default Privacy Policy',
                'description_en' => 'Default Privacy Policy',
                'order' => 2,
                'deletable' => 0
            ],
            [
                'name' => 'ব্যবহারের শর্তাবলি',
                'name_en' => 'Terms and Conditions',
                'slug' => 'terms-and-condition',
                'description' => 'Default Terms And Condition',
                'description_en' => 'Default Terms And Condition',
                'order' => 3,
                'deletable' => 0
            ],
        ]);

    }
}
