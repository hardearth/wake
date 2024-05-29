<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\CourseLesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::factory()->count(100)->create();
    }
}
