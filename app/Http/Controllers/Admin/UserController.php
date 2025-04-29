<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['users'] = User::all();
        return view('admin.user.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_type = 'Create';
        return view('admin.user.user_create_or_update', compact('page_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->role_id != 1){
            return redirect(route('login'));
        }else{
            $request->validate([
                'role_id' => 'required',
                'name' => 'required | string | max:255',
                'phone_number' => 'nullable | string | min:11',
                'email' => 'required | string | email | max:255 | unique:users',
                'password' => 'required | string | min:8 | confirmed',
            ]);

            User::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'description' => $request->description,
                'description_en' => $request->description_en,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password),
            ]);
            Toastr::success("User Created Successfully", 'Success');
            return redirect(route('user.index'));
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
        $page_type = 'Update';
        $user = User::findOrFail($id);
        return view('admin.user.user_create_or_update', compact('page_type', 'user'));
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
        if(auth()->user()->role_id != 1){
            return redirect(route('login'));
        }else {
            $request->validate([
                'role_id' => 'required',
                'name' => 'required | string | max:255',
                'phone_number' => 'nullable | string | min:11',
                'email' => ['required', ' string', 'email', Rule::unique('users', 'email')->ignore($id)],
            ]);
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'description' => $request->description,
                'description_en' => $request->description_en,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password),
            ]);
            Toastr::success("User Updated Successfully", 'Success');
            return redirect(route('user.index'));
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
        if ($id==1){
            Toastr::error("You can't delete this User", 'Error');
            return back();
        }
        if(auth()->user()->role_id != 1){
            return redirect(route('login'));
        }else {
            $user = User::findOrFail($id);
            $user->delete();
            Toastr::success("Operator Deleted Successfully", 'Success');
            return back();
        }
    }
}
