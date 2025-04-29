<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['polls'] = Poll::all();
        return view('admin.poll.poll', $data);
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
            'title' => 'required | string | max:255'
        ]);
        Poll::create([
           'title' => $request->title,
           'description' => $request->description,
        ]);
        Toastr::success("Poll Created Successfully", 'Success');
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
            'title' => 'required | string | max:255'
        ]);
        $poll = Poll::findOrFail($id);
        $poll->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        Toastr::success("Poll Updated Successfully", 'Success');
        return back();
    }


    // pool update by user

    public function poll_update(Request $request, $id)
    {
        $request->validate(['poll' => 'required'],['poll.required' => 'দয়া করে আপনার মতামত ‍সিলেক্ট করুন!']);
        $poll = Poll::findOrFail($id);
        if ($request->poll == 1){
            $poll->yes = $poll->yes + 1;
            $poll->save();
            Toastr::success("Thanks For Vote", 'Success');
            return back();
        }elseif ($request->poll == 2){
            $poll->no = $poll->no + 1;
            $poll->save();
            Toastr::success("Thanks For Vote", 'Success');
            return back();
        }elseif ($request->poll == 3){
            $poll->no_comment = $poll->no_comment + 1;
            $poll->save();
            Toastr::success("Thanks For Vote", 'Success');
            return back();
        }else{
            Toastr::Warning("Something Wrong", 'Warning');
            return back();
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();
        Toastr::success("Poll Deleted Successfully", 'Success');
        return back();
    }
}
