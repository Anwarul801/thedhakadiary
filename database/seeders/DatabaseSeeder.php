<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Marque;
use App\Models\Option;
use App\Models\Page;
use App\Models\Role;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            OptionSeeder::class,
            PageSeeder::class,
            SectionSeeder::class,
            CategorySeeder::class,
            MarqueSeeder::class,
            AdPlacementSeeder::class,
        ]);
    }
}
