<?php

namespace App\Http\Controllers\Super;

use App\Car_info;
use App\Driver_info;
use App\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Maintenance::paginate(10);

        return view('admin.maintenance.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = Car_info::where('status', '!=', 2)->get();

        return view('admin.maintenance.create', compact(['car']));
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
            'car_id' => ['required'],
            'main_type' => ['required'],
        ]);

        if ($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            Maintenance::create([
                'user_id' => Auth::id(),
                'car_id' => $request->car_id,
                'main_type' => $request->main_type,
            ]);

            $update = Car_info::find($request->car_id);
            $update->realesed_date = date('Y-m-d H:i:s');
            $update->status = 2;
            $update->update();

            session()->flash('success_msg', 'Maintenance Added!');
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
        $car = Car_info::all();
        $data = Maintenance::find($id);

        return view('admin.maintenance.edit', compact(['car', 'data']));
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
            'car_id' => ['required'],
            'main_type' => ['required'],
            'status' => ['required'],
        ]);


        if($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $main_update = Maintenance::find($id);
            $main_update->status = $request->status;
            $main_update->update();


            $update = Car_info::find($request->car_id);
            $update->realesed_date = date('Y-m-d H:i:s');
            if ($request->status == 0)
            {
                $update->status = 2;
            }

            $update->update();

            session()->flash('success_msg', 'Maintenance Info Updated!!');
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
        //
    }
}
