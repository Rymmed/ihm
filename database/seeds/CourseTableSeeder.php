<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            [
                'id' => 1,
                'name' => 'First class'
            ],
            [
                'id' => 2,
                'name' => 'Second class'
            ]
        ];

        Course::insert($courses);
    }
}
