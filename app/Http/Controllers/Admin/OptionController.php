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
//        $options = Option::all();
//        foreach ($options as $option){
//            $field_name = $option->title;
//
//            if ($option->title == 'logo' || $option->title == 'favicon' || $option->title == 'shared_image'){
//                $this->uploadImage($option, $request);
//                continue;
//            }
//            $option->update([
//                'value' => $request->$field_name
//            ]);
//        }

        $existingOptions = Option::all()->keyBy('title');
        foreach ($request->all() as $field => $value) {
            if ($field == 'logo' || $field == 'favicon' || $field == 'shared_image'){
                $this->uploadImage($field, $request);
                continue;
            }

            if ($existingOptions->has($field)) {
                $existingOptions[$field]->update([
                    'value' => $value
                ]);
            } else {
                // Create new option
                Option::create([
                    'title' => $field,
                    'value' => $value
                ]);
            }
         }
        Toastr::success("Option Updated", "Success");
        return back();
    }

    public function uploadImage($field, $request)
    {
//        $imageFields = [
//            'logo',
//            'favicon',
//            'shared_image',
//        ];
//        $option = Option::where('title', $field)->first();
//
//        $field = $option->title;
//
//        if (in_array($field, $imageFields) && $request->has($field)) {
//            $request->validate([
//                $field => 'image',
//            ]);
//            Storage::delete($option->value);
//            $uploaded = $request->file($field)->store('options');
//            $option->update([
//                'value' => $uploaded
//            ]);
//        }


        $imageFields = [
            'logo' => [342, 60],
            'favicon' => [180, 180],
            'shared_image' => [940, 788],
        ];

        foreach ($imageFields as $field => [$width, $height]) {
            if ($request->hasFile($field)) {

                $request->validate([
                    $field => 'image'
                ]);

                $option = Option::where('title', $field)->first();
                if ($option && $option->value) {
                    Storage::delete($option->value);
                }
                $path = $request->file($field)->store('options');
                $publicPath = public_path('storage/' . $path);
                Image::make($publicPath)->resize($width, $height)->save();
                if ($option) {
                    $option->update(['value' => $path]);
                } else {
                    Option::create([
                        'title' => $field,
                        'value' => $path
                    ]);
                }
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
