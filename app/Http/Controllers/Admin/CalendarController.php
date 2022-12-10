<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Session;
use App\Services\CalendarService;

class CalendarController extends Controller
{
    public function index(CalendarService $calendarService)
    {
        $weekDays     = Session::WEEK_DAYS;
        $calendarData = $calendarService->generateCalendarData($weekDays);

        return view('admin.calendar', compact('weekDays', 'calendarData'));
    }
}
