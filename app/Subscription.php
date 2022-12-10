<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $table = 'subscriptions';

    protected $fillable = [
        'member_id',
        'package_id',
        'state',
        // 'fin',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    // public function setStateAttribute($value)
    // {
    //     $this->attributes['state'] = ($value=='on')?($value==1):($value==0);
    // }

    public function setExpirationDate()
    {
        $timestemp = $this->attributes['created_at'];
        $month = Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->month;

    }

    function member()
    {
        return $this->belongsTo(User::class);
    }

    function package()
    {
        return $this->belongsTo(Package::class);
    }
}
