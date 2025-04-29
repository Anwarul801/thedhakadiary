<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class  PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['page_lists'] = Page::orderBy('order', 'asc')->get();
        return view('admin.page.page', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.page_create');
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
            'name' => 'required | string | max:255',
        ]);

        $page = new Page;
        $page->name = $request->name;
        $page->slug = Str::slug($request->name,'-');
        $page->description = $request->description;
        $page->save();
        $page->order = $page->id;
        $page->save();
        Toastr::Success('Data Added Successfully', 'Success');
        return redirect(route('page.index'));
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
        $data = Page::findOrFail($id);
        return view('admin.page.page_update', compact('id', 'data'));
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
            'name' => 'required | string | max:255',
            'order' => 'required | integer | max:2147483647',
            'status' => 'required',
        ]);

        $page = Page::findOrFail($id);
        $page->name = $request->name;
        $page->slug = Str::slug($request->name,'-');
        $page->description = $request->description;
        $page->order = $request->order;
        $page->status = $request->status;
        $page->save();
        Toastr::Success('Data Updated Successfully', 'Success');
        return redirect(route('page.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        if ($page->deletable == 0){
            Toastr::warning('You are not eligible to delete this Page. To delete a Page, please contact the developer.', 'Warning');
            return back();
        }
        $page->delete();
        Toastr::Success('Data Deleted Successfully', 'Success');
        return back();
    }
}
