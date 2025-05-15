<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\ImageGallery;
use App\Models\User;
use App\Traits\ImageCustomizeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->cleanUpImages();
        $search = $this->search_filter($request);
        $data['gallerys'] = ImageGallery::where($search)->orderBy('id', 'DESC')->paginate(10);
        $data['request'] = $request;
        return view('admin.image_gallery', $data);
    }

    public function cleanUpImages()
    {
        $ImageGallerys = GalleryImage::pluck('image')->toArray();
        $storagePath = 'gallery_image';
        $filesInStorage = Storage::files($storagePath);

        foreach ($filesInStorage as $file) {
            $filePath = 'storage/' . $file;
            if (!in_array($filePath, $ImageGallerys)) {
                ImageCustomizeTrait::deleteImage($filePath);
            }
        }
    }

    public function search_filter($request)
    {
        $search = [];
        if ($request->title){
            $search[] = ['title', 'like', '%' . $request->title . '%'];
        }
        if ($request->status){
            $search[] = ['status',$request->status];
        }
        if ($request->date){
            $search[] = ['date',$request->date];
        }
        return $search;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['authors'] = User::select('name', 'id', 'role_id')->where('role_id', 2)->get();
        $data['page_type'] = 'Create';
        return view('admin.image_gallery_create_or_update', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        $table = new ImageGallery();
        $this->dataInsert($request, $table, 'create');
        return redirect(route('image_gallery.index'))->withSuccess('Data Added Successfully!');
    }

    public function validator($request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image',
        ]);
    }



    public function dataInsert($request, $table, $type = 'update')
    {
        $table->author_id = $request->author_id??auth()->id();
        $table->title = $request->title;
        $table->title_en = $request->title_en;
        $table->date_time = $request->date_time;
        if ($request->thumbnail){
            if ($type == 'update' && $table->thumbnail != null){
                ImageCustomizeTrait::deleteImage($table->thumbnail);
            }
            $thumbnail = ImageCustomizeTrait::uploadImage($request->thumbnail, 'image_gallery_thumbnail', '648', '486');
            $table->thumbnail = $thumbnail;
        }
        $table->save();
        $table->order = $request->order ?? $table->id;
        $table->save();

        if($request->has('caption')){
            $titles = $request->caption;
            GalleryImage::where('image_gallery_id', $table->id)->delete();
            foreach($titles as $key => $title){
                $gallery_image = new GalleryImage();
                $gallery_image->image_gallery_id = $table->id;
                $gallery_image->caption = $request->input('caption')[$key]??null;
                $gallery_image->caption_en = $request->input('caption_en')[$key]??null;
                $gallery_image->photographer = $request->input('photographer')[$key]??null;
                $gallery_image->photographer_en = $request->input('photographer_en')[$key]??null;
                $gallery_image->date_time_image = $request->input('date_time_image')[$key]??null;
                $gallery_image->image = $request->input('old_image')[$key]??null;
                if($request->hasfile('image')){
                    foreach($request->file('image') as $key2 => $file){
                        if($key == $key2){
                            $fileName = ImageCustomizeTrait::uploadImage($file, 'gallery_image');
                            $gallery_image->image = $fileName;
                        }
                    }
                }
                $gallery_image->save();
                $gallery_image->order = $request->input('order_array')[$key]??$gallery_image->id;
                $gallery_image->save();
            }
        }else{
            GalleryImage::where('image_gallery_id', $table->id)->delete();
        }

    }
    public function table_status_change(Request $request)
    {
        $table = ImageGallery::where('id', $request->id)->first();
        $table->status = $request->status;
        $table->save();
        return back()->withSuccess('Status Change successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ImageGallery $imageGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['authors'] = User::select('name', 'id', 'role_id')->where('role_id', 2)->get();
        $imageGallery = ImageGallery::findOrFail($id);
        $data['page_type'] = 'Update';
        $data['image_gallery'] = $imageGallery;
        return view('admin.image_gallery_create_or_update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request);
        $imageGallery = ImageGallery::findOrFail($id);
        $table = $imageGallery;
        $this->dataInsert($request, $table, 'update');
        return redirect(route('image_gallery.index'))->withSuccess('Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $imageGallery)
    {
        $imageGallery = ImageGallery::findOrFail($id);
        if ($imageGallery->thumbnail){
            ImageCustomizeTrait::deleteImage($imageGallery->thumbnail);
        }
        $images = GalleryImage::where('image_gallery_id', $imageGallery->id)->get();

        if ($images){
            foreach ($images as $image){
                ImageCustomizeTrait::deleteImage($image->image);
                $image->delete();
            }
        }
        $imageGallery->delete();
        return redirect(route('image_gallery.index'))->withSuccess('Data Deleted Successfully!');
    }
}
