<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildAbsentForm extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'child_name',
        'phone_number',
        'location',
        'date_of_expected_return',
        'reason',
    ];

    protected $casts = [
        'date_of_expected_return' => 'date',
    ];
}
