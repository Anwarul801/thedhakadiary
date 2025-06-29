<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Marque;
use App\Models\Media;
use App\Models\Post;
use App\Models\Section;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['marque']= Marque::findOrFail(1);
        $search = [];

        if ($request->title){
            $search[] = ['title','like', "%" . $request->title . "%"];
        }
        if ($request->date){
            $search[] = ['created_at','like', "%" . $request->date . "%"];
        }
        if ($request->status){
            $search[] = ['status', $request->status];
        }
        if ($request->author_id){
            $search[] = ['author_id', $request->author_id];
        }
        if ($request->language){
            $search[] = ['language', $request->language];
        }
        if (auth()->user()->role_id == 2){
            $search[] = ['author_id', auth()->user()->id];
        }
        if ($request->hit){
            if ($request->hit == 'ASC'){
                $data['posts'] = Post::where($search)->orderBy('hit', 'ASC')->paginate(50);
            }

            if ($request->hit == 'DESC'){
                $data['posts'] = Post::where($search)->orderBy('hit', 'Desc')->paginate(50);
            }
        }else{
            $data['posts'] = Post::where($search)->orderBy('id', 'DESC')->paginate(50);
        }
        $data['authors'] = User::select('id', 'name', 'name_en')->where('role_id', 2)->get();
        $data['request'] = $request;
        return view('admin.post.post', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['categories'] = Category::where('parent_cat_id', null)->with("categories")->get();
        $data['authors'] = User::where('role_id', 2)->get();
        $data['request'] = $request;
        return view('admin.post.post_create', $data)->withShortcodes();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'news_details' => 'required',
            'caption' => 'required',
            'image' => 'required | image',
            'source' => 'required | string | max:255',
        ]);
        $media = new Media;
        $media->caption = $request->caption;
        $media->save();
        $media->order = $media->id;
        $media->save();
        if ($request->image) {
            $image = $request->file("image")->store("media_image");
            $thumbnail = $request->file("image")->store("media_thumbnail");
            $xs_thumbnail = $request->file("image")->store("media_xs");
            $image_public_path = public_path('storage/' . $image);
            $thumbnail_public_path = public_path('storage/' . $thumbnail);
            $xs_thumbnail_public_path = public_path('storage/' . $xs_thumbnail);
            Image::make($image_public_path)->resize('1200', '630')->save();
            Image::make($thumbnail_public_path)->resize('312', '163')->save();
            Image::make($xs_thumbnail_public_path)->resize('150', '78')->save();
            $media->image = $image;
            $media->thumbnail = $thumbnail;
            $media->xs_thumbnail = $xs_thumbnail;
            $media->save();
        }

        $slug = Str::slug($request->title);

        $post = new Post();
        $post->title = $request->title;
        $post->sub_headline = $request->sub_headline;
        $post->subtitle = $request->subtitle;
        $post->video_duration = $request->video_check ?  $request->video_duration : null;
        $post->video_id = $request->video_check ?  $request->video_id : null;
        if(auth()->user()->role_id==1){
        $post->source = $request->source == "Others" ? $request->onnanno : $request->source;
        $post->author_id = $request->author_id ?? null;
        $post->status = $request->status ?? "Draft";
        }else{
            $post->source = 'AuthorMiddleware';
            $post->author_id = auth()->user()->id;
            $post->status = "Pending";
        }
        $post->source_designation = $request->source_designation;
        $post->shoulder = $request->shoulder;
        $post->media_id = $media->id;
        $post->news_details = $request->news_details;
        $post->tags = $request->tags;
        $post->publishing_date = $request->publishing_date;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->latest_news = $request->latest_news ?? 0;
        $post->breaking_news = $request->breaking_news ?? 0;
        $post->language = $request->language;
        $post->header_order = $request->header_order??null;
        $post->save();
        $post->order = $post->id;

        if (Post::where('slug', $slug)->exists()){
            $slug = $slug . "-" . $post->id;
        }

        $post->slug = $slug;

        $post->categories()->attach($request->categories);
        $post->sections()->attach($request->sections);
        $post->save();

        if ($request->header_order){
            $previous_ordered_post = Post::where([['header_order', $request->header_order], ['id', '!=', $post->id]])->first();
            if ($previous_ordered_post){
                $previous_ordered_post->update([
                    'header_order' => null,
                ]);
            }
        }
        Toastr::Success('Data Added Successfully', 'Success');
        return redirect(route('post.index'));
    }



    //status change

    public function status_change(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if ($post->status == "Draft" || $post->status == "Pending"){
            $post->status = 'Published';
        }else{
            $post->status = 'Pending';
        }
        $post->save();
        Toastr::Success('Post Status Changed Successfully', "Success");
        return back();
    }





    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::where('parent_cat_id', null)->with("categories")->get();
        $data['data'] = Post::with('categories')->findOrFail($id);
        $data['data_section'] = Post::with('sections')->findOrFail($id);
        $data['authors'] = User::where('role_id', 2)->get();
        $data['id'] = $id;
        return view('admin.post.post_update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'caption' => 'required',
            'news_details' => 'required',
            'source' => 'nullable | string | max:255',
        ]);

        $slug = Str::slug($request->title);

        $post = Post::findOrFail($id);
        if ($post->title != $request->title || $post->news_details != $request->news_details || $request->image){
            $post->updating_date = date('Y-m-d\TH:i');
        }
        $post->title = $request->title;
        $post->sub_headline = $request->sub_headline;
        $post->subtitle = $request->subtitle;
        $post->video_duration = $request->video_check ?  $request->video_duration : null;
        $post->video_id = $request->video_check ?  $request->video_id : null;
        if(auth()->user()->role_id==1){
            $post->source = $request->source == "Others" ? $request->onnanno : $request->source;
            $post->author_id = $request->author_id ?? null;
            $post->status = $request->status;
        }else{
            $post->source = 'AuthorMiddleware';
            $post->author_id = auth()->user()->id;
        }
        $post->source_designation = $request->source_designation;
        $post->shoulder = $request->shoulder;
        $post->news_details = $request->news_details;
        $post->tags = $request->tags;
        $post->publishing_date = $request->publishing_date;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->latest_news = $request->latest_news ?? 0;
        $post->breaking_news = $request->breaking_news ?? 0;
        $post->slug = null;
        $post->language = $request->language;
        $post->header_order = $request->header_order??null;
        $post->order = $request->order;
        $post->categories()->detach();
        $post->sections()->detach();
        $post->categories()->attach($request->categories);
        $post->sections()->attach($request->sections);
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();

        if (Post::where('slug', $slug)->exists()){
            $slug = $slug . "-" . $post->id;
        }
        $post->slug = $slug;
        $post->save();

        if ($request->image) {
            $request->validate([
                'caption' => 'required',
                'image' => 'nullable | image',
            ]);
            $media = new Media;
            $media->caption = $request->caption;
            $media->save();
            $post->media_id = $media->id;
            $post->save();
            $media->order = $media->id;
            $media->save();
            if ($request->image) {
                $image = $request->file("image")->store("media_image");
                $thumbnail = $request->file("image")->store("media_thumbnail");
                $xs_thumbnail = $request->file("image")->store("media_xs");
                $image_public_path = public_path('storage/' . $image);
                $thumbnail_public_path = public_path('storage/' . $thumbnail);
                $xs_thumbnail_public_path = public_path('storage/' . $xs_thumbnail);
                Image::make($image_public_path)->resize('1200', '630')->save();
                Image::make($thumbnail_public_path)->resize('312', '163')->save();
                Image::make($xs_thumbnail_public_path)->resize('150', '78')->save();
                $media->image = $image;
                $media->thumbnail = $thumbnail;
                $media->xs_thumbnail = $xs_thumbnail;
                $media->save();
            }
        }else{
            $media = Media::where('id', $post->media_id)->first();
            $media->caption = $request->caption;
            $media->save();
        }

        if ($request->header_order){
            $previous_ordered_post = Post::where([['header_order', $request->header_order], ['id', '!=', $post->id]])->first();
            if ($previous_ordered_post){
                $previous_ordered_post->update([
                    'header_order' => null,
                ]);
            }
        }
        Toastr::Success('Data Updated Successfully', 'Success');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->categories()->detach();
        $post->sections()->detach();
        $post->delete();
        Toastr::Success('Data Deleted Successfully', 'Success');
        return back();
    }
}
