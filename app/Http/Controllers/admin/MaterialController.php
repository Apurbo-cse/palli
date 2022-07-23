<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Material;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('admin.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create');
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
            'image_two' => 'required|mimes:jpeg,png,jpg,JPG',
            'image_three' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $data = new Material();
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->status = $request->status;

        $time = time();
        $image = $request->file('image');
        $imagename = $time.'_material_one.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/material/';
        $image->move($path, $imagename);
        $data->image = $path.$imagename;

        $image = $request->file('image_two');
        $imagename_two= $time.'_material_two.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/material/';
        $image->move($path, $imagename_two);
        $data->image_two = $path.$imagename_two;

        $image = $request->file('image_three');
        $imagename_three = $time. '_material_three.' . $image->getClientOriginalExtension();
        $path = 'assets/admin/images/material/';
        $image->move($path, $imagename_three);
        $data->image_three = $path . $imagename_three;

        $data->save();
        Toastr::success('Material successfully create', 'Success');
        return redirect()->route('admin.material.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'image_two' => 'mimes:jpeg,png,jpg,JPG',
            'image_three' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $data = Material::findOrFail($id);
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->status = $request->status;
        $time = time();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $time . '_material_one.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/material/';

            if (file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }

            $image->move($path, $imagename);
            $img_one = $path . $imagename;
        }else{
            $img_one = $data->image;
        }
        $data->image = $img_one;

        if ($request->hasFile('image_two')) {
            $image = $request->file('image_two');
            $imagename_two = $time . '_material_two.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/material/';

            if (file_exists(public_path($data->image_two))) {
                unlink(public_path($data->image_two));
            }

            $image->move($path, $imagename_two);
            $img_two = $path . $imagename_two;
        }else{
            $img_two = $data->image_two;
        }
        $data->image_two = $img_two;

        if ($request->hasFile('image_three')) {
            $image = $request->file('image_three');
            $imagename_three = $time. '_material_three.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/material/';

            if (file_exists(public_path($data->image_three))) {
                unlink(public_path($data->image_three));
            }

            $image->move($path, $imagename_three);
            $img_three= $path . $imagename_three;
        }else{
            $img_three = $data->image_three;
        }
        $data->image_three = $img_three;

        $data->save();
        Toastr::success('Material successfully updated', 'Success');
        return redirect()->route('admin.material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Material::findOrFail($id);

        if (file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }

        if (file_exists(public_path($data->image_two))) {
            unlink(public_path($data->image_two));
        }

        if (file_exists(public_path($data->image_three))) {
            unlink(public_path($data->image_three));
        }

        $data->delete();

        Toastr::success('Material successfully deleted', 'Success');
        return redirect()->route('admin.material.index');
    }
}
