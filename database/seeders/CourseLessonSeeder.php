<?php

namespace Database\Seeders;

use App\Models\CourseLesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseLesson::factory()->count(400)->create();
    }
}
