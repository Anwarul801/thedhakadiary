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
    public function index(Request $request)
    {
        $search = [];
        if ($request->caption || $request->search){
            $term = $request->caption ?? $request->search;
            $search[] = ['caption','like','%'.$term.'%'];
        }
        if ($request->code_id){
            $search[] = ['id', $request->code_id];
        }
        if ($request->source){
            $search[] = ['source','like','%'.$request->source.'%'];
        }

        $perPage = $request->per_page ? (int) $request->per_page : 20;
        $media = Media::where($search)->latest()->paginate($perPage);

        if ($request->ajax()) {
            return response()->json($media->through(fn($m) => [
                'id'            => $m->id,
                'caption'       => $m->caption,
                'thumbnail_url' => asset('storage/' . $m->thumbnail),
            ]));
        }

        $data['media'] = $media;
        $data['pgs'] = PhotoGallery::all();
        return view('admin.media.media', $data);
    }

    public function tinymceUpload(Request $request)
    {
        $request->validate(['file' => 'required|image|max:10240']);
        $path = $request->file('file')->store('editor_images');
        return response()->json(['location' => asset('storage/' . $path)]);
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
        ]);

        $media = new Media;
        $media->caption = $request->caption;
        $media->source = $request->source;
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
                "response_html" => $response_html,
                "media_id" => $media->id,
                "thumbnail" => asset('storage/' . $media->thumbnail),
                "caption" => $media->caption,
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
        ]);
        $media = Media::findOrFail($id);
        $media->caption = $request->caption;
        $media->source = $request->source;
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

        if ($request->ajax()) {
            return response()->json([
                'message'   => 'Updated successfully',
                'caption'   => $media->caption,
                'source'    => $media->source,
                'thumbnail' => asset('storage/' . $media->thumbnail),
            ]);
        }

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
