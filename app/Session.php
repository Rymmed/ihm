<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory;

    public $table = 'sessions';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'weekday',
        'course_id',
        'end_time',
        'coach_id',
        'start_time',
        'created_at',
        'updated_at',
    ];

    const WEEK_DAYS = [
        '1' => 'Lundi',
        '2' => 'Mardi',
        '3' => 'Mercredi',
        '4' => 'Jeudi',
        '5' => 'Vendredi',
        '6' => 'Samedi',
        '7' => 'Dimanche',
    ];

    public function getDifferenceAttribute()
    {
        return Carbon::parse($this->end_time)->diffInMinutes($this->start_time);
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.session_time_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(config('panel.session_time_format'),
            $value)->format('H:i:s') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.session_time_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(config('panel.session_time_format'),
            $value)->format('H:i:s') : null;
    }

    function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public static function isTimeAvailable($weekday, $startTime, $endTime, $coach, $session)
    {
        $sessions = self::where('weekday', $weekday)
            ->when($session, function ($query) use ($session) {
                $query->where('id', '!=', $session);
            })
            ->where(function ($query) use ($coach) {
                $query->where('coach_id', $coach);
            })
            ->where([
                ['start_time', '<', $endTime],
                ['end_time', '>', $startTime],
            ])
            ->count();

        return !$sessions;
    }

    public function scopeCalendarByRoleOrCourseId($query)
    {
        return $query->when(!request()->input('course_id'), function ($query) {
            $query->when(auth()->user()->is_coach, function ($query) {
                $query->where('coach_id', auth()->user()->id);
            })
                ->when(auth()->user()->is_member, function ($query) {
                    $query->where('course_id', auth()->user()->course_id ?? '0');
                });
        })
            ->when(request()->input('course_id'), function ($query) {
                $query->where('course_id', request()->input('course_id'));
            });
    }
}
