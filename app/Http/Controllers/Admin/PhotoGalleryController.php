<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\PhotoGallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['photo_gallery'] = PhotoGallery::all();
        return view('admin.photo_gallery.photo_gallery', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo_gallery.photo_gallery_create');
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
            'title' => 'required | string | max:255',
        ]);
        $pg = new PhotoGallery;
        $pg->title = $request->title;
        $pg->description = $request->description;
        $pg->save();
        $pg->order = $pg->id;
        $pg->save();
        Toastr::Success('Data Added Successfully', 'Success');
        return redirect(route('photo_gallery.index'));
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
        $data = PhotoGallery::findOrFail($id);
        return view('admin.photo_gallery.photo_gallery_update', compact('data', 'id'));
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
            'title' => 'required | string | max:255',
            'order' => 'required | integer | max:2147483647',
            'status' => 'required',

        ]);
        $pg = PhotoGallery::findOrFail($id);
        $pg->title = $request->title;
        $pg->description = $request->description;
        $pg->order = $request->order;
        $pg->status = $request->status;
        $pg->save();
        Toastr::Success('Data Updated Successfully', 'Success');
        return redirect(route('photo_gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pg = PhotoGallery::findOrFail($id);
        Media::where('photo_gallery_id', $id)->update([
            'photo_gallery_id' => null,
        ]);
        $pg->delete();
        Toastr::Success('Data Deleted Successfully', 'Success');
        return back();
    }
}
