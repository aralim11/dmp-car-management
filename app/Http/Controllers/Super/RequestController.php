<?php

namespace App\Http\Controllers\Super;

use App\Car_info;
use App\Requisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Requisition::paginate(10);

        return view('admin.request.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Requisition::find($id);
        $car = Car_info::where('status', 0)->get();

        return view('admin.request.edit', compact(['data', 'car']));
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
            'requisition_type' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'status' => ['required'],
        ]);

        if($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $update = Requisition::find($id);


            if ($request->status == 4)
            {
                $update->realesed_by = Auth::id();
                $update->realesed_date = date('Y-m-d H:i:s');
                $update->status = $request->status;
                $update->description = $request->description;

                $car_update = Car_info::find($update->car_id);
                $car_update->status = 0;
                $car_update->realesed_date = date('Y-m-d H:i:s');
                $car_update->update();

            } else {

                $update->car_id = $request->car_id;
                $update->status = $request->status;
                $update->description = $request->description;
                $update->user_id = Auth::id();

                $car_update = Car_info::find($request->car_id);
                $car_update->status = 1;
                $car_update->realesed_date = date('Y-m-d H:i:s');
                $car_update->update();
            }

            $update->update();

            session()->flash('success_msg', 'Reviewed Successfully!');
            return redirect()->route('super.requisition.index');

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
            $delete = Requisition::find($id);
            $delete->delete();

            session()->flash('delete_msg', 'Requisition Delete!!');
            return redirect()->back();
        }
    }
}
