<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $request->validate([
            'name' => 'required | string | max:255',
            'phone_number' => 'required | min:11',
            'email' => ['required', ' string', 'email', Rule::unique('users', 'email')->ignore($id)],
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if($request->new_password){
            $request->validate([
                'old_password' => 'required',
                'new_password' => ['required', 'string', 'min:8'],
            ]);

            if (Hash::check($request->old_password, $user->password)){
                $user->password = Hash::make($request->new_password);
            }else{
                Toastr::Error('Old Password Dose not match', 'Error');
                return back();
            }
        }

        $user->save();
        Toastr::Success('Data Updated Successfully', 'Success');
        return back();
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
