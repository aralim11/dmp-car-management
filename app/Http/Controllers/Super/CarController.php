<?php

namespace App\Http\Controllers\Super;

use App\Car_info;
use App\Driver_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Car_info::paginate(8);

        return view('admin.car.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = Driver_info::all();

        return view('admin.car.create', compact(['driver']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number_plate' => ['required', 'string', 'max:255'],
            'engine_number' => ['required', 'string', 'max:255'],
            'car_id' => ['required'],
            'fuel_type' => ['required'],
            'fuel_consumption' => ['required'],
            'car_type' => ['required'],
            'site_number' => ['required'],
            'door_number' => ['required'],
            'car_weight' => ['required'],
            'reg_date' => ['required'],
            'exp_date' => ['required'],
        ]);

        if ($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $driver = Car_info::where('driver_id', $request->driver_id)->first();

            if (!empty($driver))
            {
                $update = Car_info::find($driver->id);
                $update->driver_id = NULL;
                $update->update();
            }

            Car_info::create([
                'user_id' => Auth::id(),
                'number_plate' => $request->number_plate,
                'car_id' => $request->car_id,
                'driver_id' => $request->driver_id,
                'engine_number' => $request->engine_number,
                'fuel_type' => $request->fuel_type,
                'fuel_consumption' => $request->fuel_consumption,
                'car_type' => $request->car_type,
                'site_number' => $request->site_number,
                'door_number' => $request->door_number,
                'car_weight' => $request->car_weight,
                'reg_date' => $request->reg_date,
                'exp_date' => $request->exp_date,
            ]);

            session()->flash('success_msg', 'Car Info Added!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Car_info::find($id);
        $driver = Driver_info::all();

        return view('admin.car.edit', compact(['data', 'driver']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'number_plate' => ['required', 'string', 'max:255'],
            'engine_number' => ['required', 'string', 'max:255'],
            'car_id' => ['required'],
            'fuel_type' => ['required'],
            'fuel_consumption' => ['required'],
            'car_type' => ['required'],
            'site_number' => ['required'],
            'door_number' => ['required'],
            'car_weight' => ['required'],
            'reg_date' => ['required'],
            'exp_date' => ['required'],
        ]);

        if($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

          $driver = Car_info::where('driver_id', $request->driver_id)->first();

            if (!empty($driver))
            {
                $update = Car_info::find($driver->id);

                $update->driver_id = NULL;

                $update->update();
            }

            $update = Car_info::find($id);
            $update->number_plate = $request->number_plate;
            $update->engine_number = $request->engine_number;
            $update->car_id = $request->car_id;
            $update->driver_id = $request->driver_id;
            $update->fuel_type = $request->fuel_type;
            $update->fuel_consumption = $request->fuel_consumption;
            $update->car_type = $request->car_type;
            $update->site_number = $request->site_number;
            $update->door_number = $request->door_number;
            $update->car_weight = $request->car_weight;
            $update->reg_date = $request->reg_date;
            $update->exp_date = $request->exp_date;

            $update->update();

            session()->flash('success_msg', 'Car Info Updated!!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!empty($id))
        {
            $delete = Car_info::find($id);
            $delete->delete();

            session()->flash('delete_msg', 'Car Info Delete!!');
            return redirect()->back();
        }
    }
}
