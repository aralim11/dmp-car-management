<?php

namespace App\Http\Controllers;

use App\Car_info;
use App\Requisition;

class ScriptController extends Controller
{

    public function checkDriver()
    {
        $driver_id = $_GET['driver_id'];

        $data = Car_info::where('driver_id', $driver_id)->count();

        return $data;
    }

    public function checkCar()
    {
        $car_id = $_GET['car_id'];
        $start_date = $_GET['start_date'];

        $data = Requisition::where('car_id', $car_id)
                            ->where('end_date', '<' ,$start_date)
                            ->count();

        return $data;
    }
}
