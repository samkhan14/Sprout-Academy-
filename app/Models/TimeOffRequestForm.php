<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeOffRequestForm extends Model
{
    protected $table = 'time_off_requests';

    protected $fillable = [
        'name',
        'email',
        'location',
        'todays_date',
        'start_date',
        'end_date',
        'paid_unpaid',
        'reason',
        'director_signature',
    ];

    protected $casts = [
        'todays_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
