<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;

    public $table = 'courses';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function courseSessions()
    {
        return $this->hasMany(Session::class, 'course_id', 'id');
    }

    public function courseUsers()
    {
        return $this->hasMany(User::class, 'course_id', 'id');
    }

    public function coursesPackages()
    {
        return $this->belongsToMany(Package::class);
    }

}
