<?php

use App\Session;
use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = [
            [
                'id'         => 1,
                'coach_id' => 5,
                'course_id'   => 1,
                'weekday'    => 1,
                'start_time' => '10:00',
                'end_time'   => '12:00',
            ],
            [
                'id'         => 2,
                'coach_id' => 6,
                'course_id'   => 1,
                'weekday'    => 1,
                'start_time' => '12:00',
                'end_time'   => '14:00',
            ],
            [
                'id'         => 3,
                'coach_id' => 4,
                'course_id'   => 1,
                'weekday'    => 1,
                'start_time' => '14:00',
                'end_time'   => '16:00',
            ],
            [
                'id'         => 4,
                'coach_id' => 3,
                'course_id'   => 2,
                'weekday'    => 1,
                'start_time' => '14:00',
                'end_time'   => '16:00',
            ],
            [
                'id'         => 5,
                'coach_id' => 3,
                'course_id'   => 1,
                'weekday'    => 2,
                'start_time' => '08:00',
                'end_time'   => '10:00',
            ],
            [
                'id'         => 6,
                'coach_id' => 5,
                'course_id'   => 1,
                'weekday'    => 2,
                'start_time' => '10:00',
                'end_time'   => '12:00',
            ],
            [
                'id'         => 7,
                'coach_id' => 4,
                'course_id'   => 1,
                'weekday'    => 2,
                'start_time' => '12:00',
                'end_time'   => '14:00',
            ],
            [
                'id'         => 8,
                'coach_id' => 6,
                'course_id'   => 1,
                'weekday'    => 3,
                'start_time' => '10:00',
                'end_time'   => '12:00',
            ],
            [
                'id'         => 9,
                'coach_id' => 2,
                'course_id'   => 1,
                'weekday'    => 3,
                'start_time' => '12:00',
                'end_time'   => '14:00',
            ],
            [
                'id'         => 10,
                'coach_id' => 3,
                'course_id'   => 1,
                'weekday'    => 3,
                'start_time' => '14:00',
                'end_time'   => '16:00',
            ],
            [
                'id'         => 11,
                'coach_id' => 2,
                'course_id'   => 1,
                'weekday'    => 4,
                'start_time' => '10:00',
                'end_time'   => '12:00',
            ],
            [
                'id'         => 12,
                'coach_id' => 3,
                'course_id'   => 1,
                'weekday'    => 4,
                'start_time' => '12:00',
                'end_time'   => '14:00',
            ],
            [
                'id'         => 13,
                'coach_id' => 4,
                'course_id'   => 1,
                'weekday'    => 4,
                'start_time' => '14:00',
                'end_time'   => '16:00',
            ],
            [
                'id'         => 14,
                'coach_id' => 3,
                'course_id'   => 1,
                'weekday'    => 5,
                'start_time' => '08:00',
                'end_time'   => '10:00',
            ],
            [
                'id'         => 15,
                'coach_id' => 2,
                'course_id'   => 1,
                'weekday'    => 5,
                'start_time' => '10:00',
                'end_time'   => '12:00',
            ],
            [
                'id'         => 16,
                'coach_id' => 6,
                'course_id'   => 1,
                'weekday'    => 5,
                'start_time' => '12:00',
                'end_time'   => '14:00',
            ],
        ];

        Session::insert($sessions);
    }
}
