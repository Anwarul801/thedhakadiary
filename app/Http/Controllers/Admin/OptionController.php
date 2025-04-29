<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.option.options');
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
        $options = Option::all();
        foreach ($options as $option){
            $field_name = $option->title;

            if ($option->id == 5 || $option->id == 6 || $option->id == 7 || $option->id == 20){
                $this->uploadImage($option, $request);
                continue;
            }
            $option->update([
                'value' => $request->$field_name
            ]);
        }
        Toastr::success("Option Updated", "Success");
        return back();
    }

    public function uploadImage($option, $request)
    {

        if ($option->title == "logo"){
            if ($request->has('logo')){
                $request->validate([
                    'logo' => 'image|max:1000'
                ]);
                Storage::delete($option->value);
                $logo = $request->file('logo')->store('options');
                $logo_public_path = public_path('storage/' . $logo);
                Image::make($logo_public_path)->resize(260, 45)->save();
                $option->update([
                    'value' => $logo
                ]);
            }
        }

        if ($option->title == "favicon"){
            if ($request->has('favicon')){
                $request->validate([
                    'favicon' => 'image|max:1000'
                ]);
                Storage::delete($option->value);
                $favicon = $request->file('favicon')->store('options');
                $favicon_public_path = public_path('storage/' . $favicon);
                Image::make($favicon_public_path)->resize(15, 15)->save();
                $option->update([
                    'value' => $favicon
                ]);
            }
        }

        if ($option->title == "logo_for_mobile"){
            if ($request->has('logo_for_mobile')){
                $request->validate([
                    'logo_for_mobile' => 'image|max:1000'
                ]);
                Storage::delete($option->value);
                $logo_for_mobile = $request->file('logo_for_mobile')->store('options');
                $logo_for_mobile_public_path = public_path('storage/' . $logo_for_mobile);
                Image::make($logo_for_mobile_public_path)->resize(260, 45)->save();
                $option->update([
                    'value' => $logo_for_mobile
                ]);
            }
        }

        if ($option->title == "shared_image"){
            if ($request->has('shared_image')){
                $request->validate([
                    'logo_for_mobile' => 'image|max:2000'
                ]);
                Storage::delete($option->value);
                $shared_image = $request->file('shared_image')->store('options');
                $shared_image_public_path = public_path('storage/' . $shared_image);
                Image::make($shared_image_public_path)->resize(940, 788)->save();
                $option->update([
                    'value' => $shared_image
                ]);
            }
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
        //
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
