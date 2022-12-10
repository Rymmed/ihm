<?php

namespace Tests\Feature;

use App\Session;
use App\Role;
use App\Class;
use App\Course;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Calendar Page Returns 200 code, so no errors.
     *
     * @return void
     */
    public function testCalendarPageIsLoadingForAdmin()
    {
        $role = Role::create([
            'name' => 'Admin'
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $admin->roles()->attach($role->id);

        $response = $this->actingAs($admin)->get('/admin/calendar');

        $response->assertSuccessful();
    }

    /**
     * Test Calendar Page Shows the Session we created
     *
     * @return void
     */
    public function testCalendarPageShowsSessionForCoach()
    {
        // Create class
        $course = Course::create([
            'name' => 'Class no.1'
        ]);

        // Create coach
        $role = Role::create([
            'name' => 'Coach'
        ]);
        $coach = User::create([
            'name' => 'Coach',
            'email' => 'coach@coach.com',
            'password' => bcrypt('password')
        ]);
        $coach->roles()->attach($role->id);

        // Create session
        Session::create([
            'weekday' => 1,
            'start_time' => '10:00',
            'end_time' => '12:00',
            'coach_id' => $coach->id,
            'course_id' => $course->id,
        ]);

        $response = $this->actingAs($coach)->get('/admin/calendar');

        $response->assertSuccessful();
        $response->assertSeeText($course->name);
    }
}
