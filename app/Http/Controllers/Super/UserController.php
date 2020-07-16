<?php

namespace App\Http\Controllers\Super;

use App\Car_info;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->access == 0)
        {
            $data = User::paginate(10);

        } else {

            $data = User::where('access', '!=', 0)->paginate(10);

        }

        return view('admin.user.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();

        return view('admin.user.create', compact(['role']));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'designation' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'user_role' => ['required'],
        ]);

        if ($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'designation' => $request->designation,
                'phone' => $request->phone,
                'user_role' => $request->user_role,
                'password' => Hash::make('1234'),
            ]);

            session()->flash('success_msg', 'User Info Added!');
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
        $data = User::find($id);
        $role = Role::all();

        return view('admin.user.edit', compact(['data', 'role']));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'designation' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'user_role' => ['required'],
        ]);

        if($validator->fails())
        {
            session()->flash('delete_msg', 'Error!! Check Hints!!');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $update = User::find($id);
            $update->name = $request->name;
            $update->email = $request->email;
            $update->designation = $request->designation;
            $update->phone = $request->phone;
            $update->user_role = $request->user_role;

            $update->update();

            session()->flash('success_msg', 'User Info Updated!!');
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
            $delete = User::find($id);
            $delete->delete();

            session()->flash('delete_msg', 'User Info Delete!!');
            return redirect()->back();
        }
    }
}
