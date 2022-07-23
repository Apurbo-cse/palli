<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos= Video::all();
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'status' => 'required',
        ]);

        $data = new Video();
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $file = $request->file('video');
        $fileName = time().'_video.'.$file->getClientOriginalExtension();
        $path = 'assets/admin/video/';
        $file->move($path, $fileName);
        $data->video = $path.$fileName;
        $data->status = $request->status;
        $data->save();
        Toastr::success('Video successfully create', 'Success');
        return redirect()->route('admin.video.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video= Video::findOrFail($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'video' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $video= Video::findOrFail($id);
        $video->title = $request->title;
        $video->sub_title = $request->sub_title;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time().'_video.'.$file->getClientOriginalExtension();
            $path = 'assets/admin/video/';
            if (file_exists(public_path($video->image))) {
                unlink(public_path($video->image));
            }
            $file->move($path, $fileName);
            $video_path = $path.$fileName;
        }else{
            $video_path = $video->video;
        }
        $video->video = $video_path;
        $video->status = $request->status;

        $video->save();
        Toastr::success('Video successfully updated', 'Success');
        return redirect()->route('admin.video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if (file_exists(public_path($video->video))) {
            unlink(public_path($video->video));
        }
        $video->delete();
        Toastr::success('Video successfully deleted', 'Success');
        return redirect()->route('admin.video.index');
    }
}
