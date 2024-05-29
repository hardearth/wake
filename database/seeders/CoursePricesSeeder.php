<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CoursePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursePricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $price = new CoursePrice();
            $price->amount = rand(10, 1000);
            $price->courses_id = $course->id;
            $price->created_user = 1;
            $price->save();
        }
    }
}
