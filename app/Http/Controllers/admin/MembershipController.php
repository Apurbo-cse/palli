<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Membership;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships= Membership::all();
        return view('admin.membership.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership.create');
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
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $data = new Membership();
        $data->title = $request->title;
        $image = $request->file('image');
        $imagename = time().'_membership.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/membership/';
        $image->move($path, $imagename);
        $data->image = $path.$imagename;
        $data->status = $request->status;

        $data->save();
        Toastr::success('Membership successfully create', 'Success');
        return redirect()->route('admin.membership.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership= Membership::findOrFail($id);
        return view('admin.membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $membership= Membership::findOrFail($id);
        $membership->title = $request->title;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'_membership.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/membership/';

            if (file_exists(public_path($membership->image))) {
                unlink(public_path($membership->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $membership->image;
        }

        $membership->image = $img;
        $membership->status = $request->status;

        $membership->save();
        Toastr::success('Membership successfully updated', 'Success');
        return redirect()->route('admin.membership.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        if (file_exists(public_path($membership->image))) {
            unlink(public_path($membership->image));
        }
        $membership->delete();
        Toastr::success('Membership successfully deleted', 'Success');
        return redirect()->route('admin.membership.index');
    }
}
