<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        $data['pages'] = Page::all();
        $data['menus'] = Menu::orderBy('order', 'asc')->get();
//        $data['menu_without_parent'] = Menu::where('title_en', null)->get();
        return view('admin.menu.menu', $data);
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
            'title' => 'required | string | max:255',
            'title_en' => 'nullable | string | max:255',
        ]);
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->title_en = $request->title_en ?? null;
        $menu->type = $request->type;
        if ($request->type == 'Category'){
            $request->validate([
                'category_id' => 'required',
            ],[
                'category_id.required' => 'Please Select A Category',
            ]);
            $menu->category_id = $request->category_id;
            $menu->page_id = null;
            $menu->link = null;
        }
        if ($request->type == 'Page'){
            $request->validate([
                'page_id' => 'required',
            ],[
                'page_id.required' => 'Please Select A Page',
            ]);
            $menu->page_id = $request->page_id;
            $menu->link = null;
            $menu->category_id = null;
        }
        if ($request->type == 'Link'){
            $request->validate([
                'link' => 'required',
            ],[
                'link.required' => 'Please Provide a link',
            ]);
            $menu->link = $request->link;
            $menu->page_id = null;
            $menu->category_id = null;
        }
        $menu->save();
        $menu->order = $menu->id;
        $menu->save();

        Toastr::success('Data Added Successfully', 'Success');
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
            'title' => 'required | string | max:255',
            'order' => 'required | integer',
            'title_en' => 'nullable | string | max:255'
        ]);
        $menu = Menu::findOrFail($id);
        $menu->title = $request->title;
        $menu->title_en = $request->title_en ?? null;
        $menu->type = $request->type;
        if ($request->type == 'Category'){
        $request->validate([
            'category_id' => 'required',
        ],[
            'category_id.required' => 'Please Select A Category',
        ]);
        $menu->category_id = $request->category_id;
            $menu->page_id = null;
            $menu->link = null;
    }
        if ($request->type == 'Page'){
            $request->validate([
                'page_id' => 'required',
            ],[
                'page_id.required' => 'Please Select A Page',
            ]);
            $menu->page_id = $request->page_id;
            $menu->link = null;
            $menu->category_id = null;
        }
        if ($request->type == 'Link'){
            $request->validate([
                'link' => 'required',
            ],[
                'link.required' => 'Please Provide a link',
            ]);
            $menu->link = $request->link;
            $menu->page_id = null;
            $menu->category_id = null;
        }
        $menu->order = $request->order;
        $menu->save();

        Toastr::success('Data Updated Successfully', 'Success');
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
        $menu = Menu::findOrFail($id);
        $menu->delete();
        Toastr::success('Data Deleted Successfully', 'Success');
        return back();
    }
}
