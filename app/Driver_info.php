<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver_info extends Model
{
    protected $fillable = [
        'user_id', 'driver_name', 'license_number', 'phone_number', 'license_issue_date',
        'license_exp_date', 'picture', 'driver_id',
    ];
}
