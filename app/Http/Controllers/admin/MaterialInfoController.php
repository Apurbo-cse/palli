<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\MaterialInfo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MaterialInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialInfo = MaterialInfo::first();
        return view('admin.materialInfo.index', compact('materialInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\MaterialInfo  $materialInfo
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialInfo $materialInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialInfo  $materialInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialInfo $materialInfo)
    {
        $materialInfo = MaterialInfo::first();
        return view('admin.materialInfo.edit', compact('materialInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialInfo  $materialInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'tech_description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
        ]);

        

        $materialInfo = MaterialInfo::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'_materialinfo.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images';

            if (file_exists(public_path($materialInfo->image))) {
                unlink(public_path($materialInfo->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $materialInfo->image;
        }

        $materialInfo->description = $request->description;
        $materialInfo->tech_description = $request->tech_description;


        $materialInfo->save();
        Toastr::success('Material Info successfully updated', 'Success');
        return redirect()->route('admin.materialInfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialInfo  $materialInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialInfo $materialInfo)
    {
        //
    }
}
