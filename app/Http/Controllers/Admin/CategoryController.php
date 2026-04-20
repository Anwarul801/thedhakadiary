<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('order', 'asc')->get();
//        $data['cat_without_parent'] = Category::where('parent_cat_id', null)->get();
        return view('admin.category.category', $data);
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
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'name_en' => ['nullable', 'string', 'max:255'],
        ]);
        $slug = Str::slug($request->name,'-');
        $cat = new Category;
        $cat->name = $request->name;
        $cat->name_en = $request->name_en;
        $cat->max_position = $request->max_position;
        $cat->save();
        if (Category::where('slug', $slug)->exists()){
            $slug = $slug . "-" . $cat->id;
        }
        $cat->slug = $slug;
        $cat->order = $request->order?? $cat->id;
        $cat->save();
        Toastr::success("Category Created Successfully", 'Success');
        return back();
    }


    public function category_status_change(Request $request)
    {
        $cat = Category::findOrFail($request->id);
        if ($cat->status == "Active"){
            $cat->status = "In-Active";
            $cat->save();
            Toastr::success("Category Inactivated Successfully", 'Success');
        }else{
            $cat->status = "Active";
            $cat->save();
            Toastr::success("Category Activated Successfully", 'Success');
        }
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
            'name' => ['required', 'string', 'max:255'],
        ]);
        $slug = Str::slug($request->name,'-');
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->name_en = $request->name_en;
        $cat->max_position = $request->max_position;
        $cat->order = $request->order;
        $cat->save();
        if (Category::where([['slug', $slug], ['id', '!=', $cat->id]])->exists()){
            $slug = $slug . "-" . $cat->id;
        }
        $cat->slug = $slug;
        $cat->save();
        Toastr::success("Category Updated Successfully", 'Success');
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
        $cat = Category::findOrFail($id);
        if ($cat->deletable == 0){
            Toastr::warning("You are not eligible to delete this category. To delete a category, please contact the developer.", 'Warning');
            return back();
        }
        $cat->posts()->detach();
        $cat->delete();
        Toastr::success("Category Deleted Successfully", 'Success');
        return back();
    }
}
