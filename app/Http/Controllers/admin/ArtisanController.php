<?php

namespace App\Http\Controllers\admin;

use App\Artisan;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artisans= Artisan::all();
        return view('admin.artisan.index', compact('artisans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artisan.create');
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
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $data = new Artisan();
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->description = $request->description;
        $image = $request->file('image');
        $imagename = time().'_artisan.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/artisan/';
        $image->move($path, $imagename);
        $data->image = $path.$imagename;
        $data->status = $request->status;

        $data->save();
        Toastr::success('Artisan successfully create', 'Success');
        return redirect()->route('admin.artisan.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function show(Artisan $artisan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artisan = Artisan::findOrFail($id);
        return view('admin.artisan.edit', compact('artisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $artisan= Artisan::findOrFail($id);
        $artisan->name = $request->name;
        $artisan->designation = $request->designation;
        $artisan->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'_artisan.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/artisan/';
            if (file_exists(public_path($artisan->image))) {
                unlink(public_path($artisan->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $artisan->image;
        }

        $artisan->image = $img;
        $artisan->status = $request->status;

        $artisan->save();
        Toastr::success('Artisan successfully updated', 'Success');
        return redirect()->route('admin.artisan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artisan = Artisan::findOrFail($id);
        if (file_exists(public_path($artisan->image))) {
            unlink(public_path($artisan->image));
        }
        $artisan->delete();
        Toastr::success('Artisan successfully deleted', 'Success');
        return redirect()->route('admin.artisan.index');
    }
}
