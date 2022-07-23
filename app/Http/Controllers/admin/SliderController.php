<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders= Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $data = new Slider();
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;

        $image = $request->file('image');
        $imagename = time().'_slider.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/slider/';
        $image->move($path, $imagename);

        $data->image = $path.$imagename;
        $data->status = $request->status;

        $data->save();
        Toastr::success('Slider successfully create', 'Success');
        return redirect()->route('admin.sliders.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider= Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $slider= Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'_slider.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/slider/';

            if (file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $slider->image;
        }

        $slider->image = $img;
        $slider->status = $request->status;

        $slider->save();
        Toastr::success('Slider successfully updated', 'Success');
        return redirect()->route('admin.sliders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if (file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }
        $slider->delete();
        Toastr::success('Slider successfully deleted', 'Success');
        return redirect()->route('admin.sliders.index');
    }
}
