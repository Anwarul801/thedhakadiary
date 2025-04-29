<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdPlacement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ad_placements'] = AdPlacement::all();
        $data['ads'] = Ad::all();
        return view('admin.ad.ad', $data);

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
//        validation
        $request->validate([
           'type' => 'required',
           'placement_id' => 'required',
           'start_date' => 'required',
           'end_date' => 'required',
           'status' => 'required'
        ]);
        if ($request->status == "Active"){
            $adCheck = Ad::where([
                ['placement_id', $request->placement_id],
                ['status', 'Active',]
            ])->exists();
            if ($adCheck){
                Toastr::warning('Ad already exists on this place! Please inactive your ad and then create another ad!', 'Warning');
                return back();
            }
        }

        if ($request->type == 'Internal'){
            $request->validate([
                'file_type' => 'required',
                'file' => 'required',
                'link' => 'required',
            ]);
        }else{
            $request->validate([
                'code' => 'required',
            ]);
        }
//        Data Store

        $ad = new Ad;
        $ad->type = $request->type;
        $ad->placement_id = $request->placement_id;
        if ($request->type == 'Internal'){
            $ad->file_type = $request->file_type;

//            image size by placement
            if ($request->placement_id == 1 || $request->placement_id == 8){
                $imageWidth = '600';
                $imageHeight = '500';
            }elseif ($request->placement_id == 2 || $request->placement_id == 9){
                $imageWidth = '970';
                $imageHeight = '90';
            }elseif ($request->placement_id == 3 || $request->placement_id == 4 || $request->placement_id == 5 || $request->placement_id == 6){
                $imageWidth = '300';
                $imageHeight = '250';
            }elseif ($request->placement_id == 7){
                $imageWidth = '970';
                $imageHeight = '250';
            }
//            file check
             if ($request->file_type == 'Image'){
                 $request->validate([
                     'file' => 'image | max:1024'
                 ]);
                 $file = $request->file("file")->store("ad_image");
                 $file_public_path = public_path('storage/' . $file);
                 Image::make($file_public_path)->resize($imageWidth, $imageHeight)->save();
                 $ad->file = $file;
                 $ad->save();
             }elseif ($request->file_type == 'GIF'){
                 $request->validate([
                     'file' => 'file|mimes:gif|max:2048'
                 ]);
                 $file = $request->file("file")->store("ad_gif");
                 $ad->file = $file;
                 $ad->save();
             }else{
                 $request->validate([
                     'file' => 'file|mimes:mp4,mov,avi,wmv|max:5000'
                 ],[
                     'file.max' => 'Video Max Size 1MB'
                 ]);
                 $file = $request->file("file")->store("ad_video");
                 $ad->file = $file;
                 $ad->save();
             }
            $ad->link = $request->link;
        }else{
            $ad->code = $request->code;
        }
        $ad->status = $request->status;
        $ad->start_date = $request->start_date;
        $ad->end_date = $request->end_date;
        $ad->save();
        Toastr::success('Data Added Successfully', "Success");
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
        $ad = Ad::findOrFail($id);
        $adCheck = Ad::where([
            ['id', '!=', $id],
            ['placement_id', $ad->placement_id],
            ['status', 'Active',]
        ])->exists();
        if ($adCheck){
            Toastr::warning('Ad already exists on this place! Please inactive your ad and then Active another ad!', 'Warning');
            return back();
        }
        $status = $ad->status == 'Active' ? 'In-Active' : 'Active';
        $ad->status = $status;
        $ad->save();
        Toastr::success('Ad Status Changed Successfully', 'Success');
        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        Storage::delete($ad->file);
        $ad->delete();
        Toastr::success('Ad Deleted Successfully', 'Success');
        return back();
    }
}
