<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = [
        'req_user_id', 'requisition_type', 'start_date', 'end_date',
    ];

    public function ReqUserName()
    {
        return $this->belongsTo(User::class, 'req_user_id', 'id')->withDefault();
    }

    public function getCar()
    {
        return $this->belongsTo(Car_info::class, 'car_id', 'id')->withDefault();
    }
}
