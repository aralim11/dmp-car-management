<?php

namespace App\Http\Controllers\User;

use App\Driver_info;
use App\Maintenance;
use App\Requisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Requisition::where('req_user_id', Auth::id())->paginate(10);

        return view('user.request.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.request.create');
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
            'requisition_type' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        if($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            Requisition::create([
                'req_user_id' => Auth::id(),
                'requisition_type' => $request->requisition_type,
                'start_date' => date("Y-m-d H:i:s", strtotime($request->start_date)),
                'end_date' => date("Y-m-d H:i:s", strtotime($request->end_date)),
                'realesed_date' => date("Y-m-d H:i:s", strtotime($request->end_date)),
            ]);

            session()->flash('success_msg', 'Send Requisition Successfully!');
            return redirect()->route('user.requisition.index');

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
        $data = Requisition::find($id);

        return view('user.request.show', compact(['data']));
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

        return view('user.request.edit', compact(['data']));

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
        $data = Requisition::find($id);

            $validator = Validator::make($request->all(), [
                'requisition_type' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);


            if($validator->fails())
            {
                session()->flash('delete_msg', 'Error!! Check Hints!!');
                return redirect()->back()->withErrors($validator)->withInput();

            } else {

                $update = Requisition::find($id);

                if ($request->status == 5)
                {
                    Maintenance::create([
                        'req_id' => Auth::id(),
                        'car_id' => $update->car_id,
                        'main_type' => $request->main_type,
                        'status' => 2,
                    ]);

                    $update->status = $request->status;
                    $update->update();

                    session()->flash('success_msg', 'Maintenance Request Successfully!');
                    return redirect()->route('user.requisition.index');

                } else {

                    $update->requisition_type = $request->requisition_type;
                    $update->start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
                    $update->end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
                    $update->status = $request->status;

                    $update->update();

                    session()->flash('success_msg', 'Send Update Successfully!');
                    return redirect()->route('user.requisition.index');
                }
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
