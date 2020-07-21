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
        $car_id = array();
        $car_req = Requisition::select('car_id')
            ->where('status', '!=' ,3)
            ->where('car_id', '!=' , NULL)
            ->where('end_date', '>' ,date('y-m-d H:i:s'))
            ->get();

        foreach ($car_req as $car_reqs)
        {
            array_push($car_id, $car_reqs->car_id);
        }
//        print_r($car_id);
//        exit();
        $car = DB::table('car_infos')->whereNotIn('id', $car_id)->get();


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
            $update->car_id = $request->car_id;
            $update->status = $request->status;
            $update->description = $request->description;
            $update->user_id = Auth::id();

            $update->update();

            session()->flash('success_msg', 'Reviewed Successfully!');
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
            $delete = Requisition::find($id);
            $delete->delete();

            session()->flash('delete_msg', 'Requisition Delete!!');
            return redirect()->back();
        }
    }
}
