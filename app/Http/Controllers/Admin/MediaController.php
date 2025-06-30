<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\PhotoGallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['media'] = Media::paginate(50);
        $data['pgs'] = PhotoGallery::all();
        return view('admin.media.media', $data);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'image' => 'required | image',
            'photo_gallery_id' => 'integer',
        ],[
            'photo_gallery_id' => 'Photo Gallery Not Support'
        ]);

        $media = new Media;
        $media->caption = $request->caption;
        $media->source = $request->source;
        $media->photo_gallery_id = $request->photo_gallery_id;
        $media->save();
        $media->order = $media->id;
        $media->save();
        if ($request->image){
            $image = $request->file("image")->store("media_image");
            $thumbnail = $request->file("image")->store("media_thumbnail");
            $xs_thumbnail = $request->file("image")->store("media_xs");
            $image_public_path = public_path('storage/' . $image);
            $thumbnail_public_path = public_path('storage/' . $thumbnail);
            $xs_thumbnail_public_path = public_path('storage/' . $xs_thumbnail);
            Image::make($image_public_path)->resize('1280', '672')->save();
            Image::make($thumbnail_public_path)->resize('312', '163')->save();
            Image::make($xs_thumbnail_public_path)->resize('150', '78')->save();
            $media->image = $image;
            $media->thumbnail = $thumbnail;
            $media->xs_thumbnail = $xs_thumbnail;
            $media->save();
        }


        if ($request->type == 'ajax'){
            $s_code = "[img id={$media->id}]";

            $response_html = "<div class=\"mb-2 col-6\">
<img class=\"w-100 mb-2\" src=\"".asset('storage'). '/' .$media->thumbnail."\" alt=''>
                                <button type=\"button\" class=\"btn form-control btn-primary\" onclick=\"navigator.clipboard.writeText('".$s_code."')\">Copy <i class=\"fa fa-copy\"></i></button>
                                </div>";
            return response()->json([
                "message" => "Media added Successfully",
                "response_html" => $response_html
            ]);
        }

        Toastr::Success('Data Added Successfully', 'Success');
        return back();
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
            'caption' => 'required',
            'order' => 'required | integer | max:2147483647',
            'status' => 'required',
            'photo_gallery_id' => 'integer',
        ],[
            'photo_gallery_id' => 'Photo Gallery Not Support'
        ]);
        $media = Media::findOrFail($id);
        $media->caption = $request->caption;
        $media->photo_gallery_id = $request->photo_gallery_id;
        $media->source = $request->source;
        $media->order = $request->order;
        if ($request->image){
            Storage::delete($media->image);
            Storage::delete($media->thumbnail);
            Storage::delete($media->media_xs);
            $image = $request->file("image")->store("media_image");
            $thumbnail = $request->file("image")->store("media_thumbnail");
            $xs_thumbnail = $request->file("image")->store("media_xs");
            $image_public_path = public_path('storage/' . $image);
            $thumbnail_public_path = public_path('storage/' . $thumbnail);
            $xs_thumbnail_public_path = public_path('storage/' . $xs_thumbnail);
            Image::make($image_public_path)->resize('1280', '672')->save();
            Image::make($thumbnail_public_path)->resize('312', '163')->save();
            Image::make($xs_thumbnail_public_path)->resize('150', '78')->save();
            $media->image = $image;
            $media->thumbnail = $thumbnail;
            $media->xs_thumbnail = $xs_thumbnail;
        }
        $media->save();
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
        $media = Media::findOrFail($id);
        Storage::delete($media->image);
        Storage::delete($media->thumbnail);
        Storage::delete($media->media_xs);
        $media->delete();
        Toastr::Success('Data Deleted Successfully', 'Success');
        return back();

    }
}
