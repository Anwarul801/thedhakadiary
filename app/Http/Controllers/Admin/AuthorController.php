<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['authors'] = Author::all();
        return view('admin.author.author', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['types'] = Type::all();
        return view('admin.author.author_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name_bn' =>'required | string | max:255',
           'name_en' =>'required | string | max:255',
           'email' =>'required | email | max:255',
           'profession' =>'required | string | max:255',
           'type_id' =>'required | integer',
        ]);

        $author = new Author;
        $author->name_bn = $request->name_bn;
        $author->name_en = $request->name_en;
        $author->email = $request->email;
        $author->profession = $request->profession;
        $author->type_id = $request->type_id;
        $author->details = $request->details;
        $author->save();
        $author->order = $author->id;
        $author->save();
        if ($request->profile_picture){
            $request->validate([
                'profile_picture' => 'image'
            ]);
            $profile = $request->file("profile_picture")->store("author_profile_picture");
            $profile_picture_public_path = public_path('storage/' . $profile);
            Image::make($profile_picture_public_path)->resize('200', '200')->save();
            $author->profile_picture = $profile;
            $author->save();
        }
        Toastr::Success('Data Added Successfully', 'Success');
        return redirect(route('author.index'));
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
        $data['data'] = Author::findOrFail($id);
        $data['types'] = Type::all();
        return view('admin.author.author_update', $data);
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
            'name_bn' =>'required | string | max:255',
            'name_en' =>'required | string | max:255',
            'email' =>'required | email | max:255',
            'profession' =>'required | string | max:255',
            'type_id' =>'required | integer',
            'order' => 'required | integer | max:2147483647',
            'status' => 'required',
        ]);

        $author = Author::findOrFail($id);
        $author->name_bn = $request->name_bn;
        $author->name_en = $request->name_en;
        $author->email = $request->email;
        $author->profession = $request->profession;
        $author->type_id = $request->type_id;
        $author->details = $request->details;
        $author->order = $request->order;
        if ($request->profile_picture){
            $request->validate([
                'profile_picture' => 'image'
            ]);
            Storage::delete($author->profile_picture);
            $profile = $request->file("profile_picture")->store("author_profile_picture");
            $profile_picture_public_path = public_path('storage/' . $profile);
            Image::make($profile_picture_public_path)->resize('200', '200')->save();
            $author->profile_picture = $profile;
        }
        $author->save();

        Toastr::Success('Data Updated Successfully', 'Success');
        return redirect(route('author.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        Storage::delete($author->profile_picture);
        $author->delete();
        Toastr::Success('Data Deleted Successfully', 'Success');
        return back();
    }
}
