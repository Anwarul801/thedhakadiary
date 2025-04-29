<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::insert([
            ['name' => 'জাতীয়', 'slug' => 'national', 'name_en' => 'National', 'order' => 1, 'status' => "Active", 'deletable' => 1],
            ['name' => 'মতামত', 'slug' => 'opinion', 'name_en' => 'Opinion', 'order' => 2, 'status' => "Active", 'deletable' => 1],
            ['name' => 'রাজনীতি', 'slug' => 'politics', 'name_en' => 'Politics', 'order' => 3, 'status' => "Active", 'deletable' => 1],
            ['name' => 'সারাদেশ', 'slug' => 'saradesh', 'name_en' => 'Whole Country', 'order' => 4, 'status' => "Active", 'deletable' => 1],
            ['name' => 'ডিজিটাল', 'slug' => 'digital', 'name_en' => 'Digital', 'order' => 5, 'status' => "Active", 'deletable' => 1],
            ['name' => 'আন্তর্জাতিক', 'slug' => 'international', 'name_en' => 'International', 'order' => 6, 'status' => "Active", 'deletable' => 1],
            ['name' => 'বিনোদন', 'slug' => 'entertainment', 'name_en' => 'Entertainment', 'order' => 7, 'status' => "Active", 'deletable' => 1],
            ['name' => 'খেলা', 'slug' => 'sports', 'name_en' => 'Sports', 'order' => 8, 'status' => "Active", 'deletable' => 1],
            ['name' => 'অর্থনীতি', 'slug' => 'economy', 'name_en' => 'Economy', 'order' => 9, 'status' => "Active", 'deletable' => 1],
            ['name' => 'কর্পোরেট', 'slug' => 'corporate', 'name_en' => 'Corporate', 'order' => 10, 'status' => "Active", 'deletable' => 1],
            ['name' => 'ক্যাম্পাস', 'slug' => 'campus', 'name_en' => 'Campus', 'order' => 11, 'status' => "Active", 'deletable' => 1],
            ['name' => 'ধর্ম', 'slug' => 'religion', 'name_en' => 'Religion', 'order' => 12, 'status' => "Active", 'deletable' => 1],
            ['name' => 'সাহিত্য', 'slug' => 'literature', 'name_en' => 'Literature', 'order' => 13, 'status' => "Active", 'deletable' => 1],
            ['name' => 'ফিচার', 'slug' => 'feature', 'name_en' => 'Feature', 'order' => 14, 'status' => "Active", 'deletable' => 1],
            ['name' => 'তথ্য প্রযুক্তি', 'slug' => 'information-technology', 'name_en' => 'Information Technology', 'order' => 15, 'status' => "Active", 'deletable' => 1],
            ['name' => 'লাইফ স্টাইল', 'slug' => 'life-style', 'name_en' => 'Life Style', 'order' => 16, 'status' => "Active", 'deletable' => 1],
            ['name' => 'স্বাস্থ্য', 'slug' => 'health', 'name_en' => 'Health', 'order' => 17, 'status' => "Active", 'deletable' => 1],
            ['name' => 'প্রবাস', 'slug' => 'migration', 'name_en' => 'Migration', 'order' => 18, 'status' => "Active", 'deletable' => 1],
            ['name' => 'আইন আদালত', 'slug' => 'court-of-law', 'name_en' => 'Court of Law', 'order' => 19, 'status' => "Active", 'deletable' => 1],
            ['name' => 'শিক্ষা', 'slug' => 'education', 'name_en' => 'Education', 'order' => 20, 'status' => "Active", 'deletable' => 1],
            ['name' => 'নেট দুনিয়া', 'slug' => 'net-world', 'name_en' => 'Net World', 'order' => 21, 'status' => "Active", 'deletable' => 1],
            ['name' => 'চাকরির প্রস্তুতি', 'slug' => 'job-news', 'name_en' => 'Job Preparation', 'order' => 22, 'status' => "Active", 'deletable' => 1],
            ['name' => 'ট্যুরস অ্যান্ড ট্রাভেলস', 'slug' => 'tours-and-travels', 'name_en' => 'Tours and Travels', 'order' => 23, 'status' => "Active", 'deletable' => 1],
            ['name' => 'বুক রিভিউ', 'slug' => 'book_review', 'name_en' => 'Book Review', 'order' => 24, 'status' => "Active", 'deletable' => 1],
            ['name' => 'রাজধানী', 'slug' => 'capital', 'name_en' => 'Capital', 'order' => 25, 'status' => "Active", 'deletable' => 1],
        ]);
    }
}
