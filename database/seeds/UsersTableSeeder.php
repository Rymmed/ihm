<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Coach',
                'email'          => 'coach@coach.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Coach 2',
                'email'          => 'coach2@coach2.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Coach 3',
                'email'          => 'coach3@coach3.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
            [
                'id'             => 5,
                'name'           => 'Coach 4',
                'email'          => 'coach4@coach4.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
            [
                'id'             => 6,
                'name'           => 'Coach 5',
                'email'          => 'coach5@coach5.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
            [
                'id'             => 7,
                'name'           => 'Member',
                'email'          => 'member@member.com',
                'password'       => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => null,
                'course_id'       => null,
            ],
        ];

        User::insert($users);
    }
}
