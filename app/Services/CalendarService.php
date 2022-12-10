<?php

namespace App\Services;

use App\Session;

class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $sessions   = Session::with('course', 'coach')
            ->calendarByRoleOrCourseId()
            ->get();

        foreach ($timeRange as $time)
        {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            foreach ($weekDays as $index => $day)
            {
                $session = $sessions->where('weekday', $index)->where('start_time', $time['start'])->first();

                if ($session)
                {
                    array_push($calendarData[$timeText], [
                        'course_name'   => $session->course->name,
                        'coach_name' => $session->coach->name,
                        'rowspan'      => $session->difference/30 ?? ''
                    ]);
                }
                else if (!$sessions->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count())
                {
                    array_push($calendarData[$timeText], 1);
                }
                else
                {
                    array_push($calendarData[$timeText], 0);
                }
            }
        }

        return $calendarData;
    }
}
