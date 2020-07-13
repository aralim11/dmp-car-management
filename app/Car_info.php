<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_info extends Model
{
    protected $fillable = [
        'user_id', 'number_plate', 'engine_number', 'fuel_type', 'fuel_consumption', 'car_type', 'site_number', 'door_number',
        'car_weight', 'reg_date', 'exp_date'
    ];
}
