<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'mission_image' => 'mimes:jpeg,png,jpg,JPG',
            'mission_desc' => 'required',
            'vision_image' => 'mimes:jpeg,png,jpg,JPG',
            'vision_desc' => 'required',
            'goal_image' => 'mimes:jpeg,png,jpg,JPG',
            'goal_desc' => 'required',
        ]);

        $about = About::findOrFail($id);

        if ($request->hasFile('mission_image')) {
            $image = $request->file('mission_image');
            $imagename = time().'_about_mission.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/about/';

            if (file_exists(public_path($about->mission_image))) {
                unlink(public_path($about->mission_image));
            }
            $image->move($path, $imagename);
            $img_mission = $path.$imagename;
        }else{
            $img_mission = $about->mission_image;
        }

        if ($request->hasFile('vision_image')) {
            $image = $request->file('vision_image');
            $imagename = time().'_about_vision.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/about/';

            if (file_exists(public_path($about->vision_image))) {
                unlink(public_path($about->vision_image));
            }
            $image->move($path, $imagename);
            $img_vision = $path.$imagename;
        }else{
            $img_vision = $about->vision_image;
        }

        if ($request->hasFile('goal_image')) {
            $image = $request->file('goal_image');
            $imagename = time().'_about_goal.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/about/';

            if (file_exists(public_path($about->goal_image))) {
                unlink(public_path($about->missiongoal_imagegoal_imageimage));
            }
            $image->move($path, $imagename);
            $img_goal = $path.$imagename;
        }else{
            $img_goal = $about->goal_image;
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->mission_desc = $request->mission_desc;
        $about->vision_desc = $request->vision_desc;
        $about->goal_desc = $request->goal_desc;
        $about->mission_image = $img_mission;
        $about->vision_image = $img_vision;
        $about->goal_image = $img_goal;
        $about->save();
        Toastr::success('About information successfully updated', 'Success');
        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
