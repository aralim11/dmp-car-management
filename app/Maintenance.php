<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'user_id', 'car_id', 'main_type', 'req_id', 'status',
    ];

    public function carInfo()
    {
        return $this->belongsTo(Car_info::class, 'car_id', 'id')->withDefault();
    }
}
