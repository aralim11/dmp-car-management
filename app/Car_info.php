<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_info extends Model
{
    protected $fillable = [
        'user_id', 'driver_id', 'number_plate', 'engine_number', 'fuel_type', 'fuel_consumption', 'car_type', 'site_number', 'door_number',
        'car_weight', 'reg_date', 'exp_date', 'car_id',
    ];

    public function driverName()
    {
        return $this->belongsTo(Driver_info::class, 'driver_id', 'id')->withDefault();
    }
}
