<?php

namespace Database\Seeders;

use App\Models\CourseLesson;
use App\Models\CourseModule;
use App\Models\CoursePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            CountriesSeeder::class,
            CategoriesSeeder::class,
            CourseSeeder::class,
            CourseModuleSeeder::class,
            CourseLessonSeeder::class,
            CoursePricesSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
