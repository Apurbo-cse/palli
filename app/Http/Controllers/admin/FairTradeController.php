<?php

namespace App\Http\Controllers\admin;

use App\FairTrade;
use App\Http\Controllers\Controller;
use App\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FairTradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fairTrades = FairTrade::all();
        return view('admin.fairTrade.index', compact('fairTrades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fairTrade.create');
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

        $data = new FairTrade();
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;

        $image = $request->file('image');
        $imagename = time().'_image_fairTrade.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/fairTrade/';
        $image->move($path, $imagename);
        $data->image = $path.$imagename;
        $data->status = $request->status;
        $data->save();
        Toastr::success('FairTrade successfully create', 'Success');
        return redirect()->route('admin.fairTrade.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FairTrade  $fairTrade
     * @return \Illuminate\Http\Response
     */
    public function show(FairTrade $fairTrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FairTrade  $fairTrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fairTrade = FairTrade::findOrFail($id);
        return view('admin.fairTrade.edit', compact('fairTrade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FairTrade  $fairTrade
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

        $fairTrade= FairTrade::findOrFail($id);
        $fairTrade->title = $request->title;
        $fairTrade->sub_title = $request->sub_title;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'_image_fairTrade.'.$file->getClientOriginalExtension();

            if (file_exists(public_path($fairTrade->image))) {
                unlink(public_path($fairTrade->image));
            }

            $path = 'assets/admin/images/fairTrade/';
            $file->move($path, $fileName);
            $fairTrade_path = $path.$fileName;
        }else{
            $fairTrade_path = $fairTrade->image;
        }
        $fairTrade->image = $fairTrade_path;
        $fairTrade->status = $request->status;

        $fairTrade->save();
        Toastr::success('FairTrade successfully updated', 'Success');
        return redirect()->route('admin.fairTrade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FairTrade  $fairTrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fairTrade = FairTrade::findOrFail($id);
        if (file_exists(public_path($fairTrade->image))) {
            unlink(public_path($fairTrade->image));
        }
        $fairTrade->delete();
        Toastr::success('FairTrade successfully deleted', 'Success');
        return redirect()->route('admin.fairTrade.index');
    }
}
