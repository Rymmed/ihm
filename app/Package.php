<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public $table = 'packages';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'duration',
        'price',
        'created_at',
        'updated_at',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function packageMembers()
    {
        return $this->hasMany(User::class);
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }    
}
