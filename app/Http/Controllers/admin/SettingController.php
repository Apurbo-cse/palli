<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting= Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');
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
            'logo' => 'required|mimes:jpeg,png,jpg,JPG',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'whatsapp'=>'required',
            'whatsapp_link'=>'required|url',
            'facebook_link'=>'required|url',
            'twitter_link'=>'required|url',
            'pintorest_link'=>'required|url',
            'messenger_link'=>'required|url',
            'about'=>'required',
            'terms_condition'=>'required',
            'privacy_policy'=>'required',
            'refund_policy'=>'required',
            'google_map_link'=>'required|url',
        ]);

        $data = new Setting();

        $image = $request->file('logo');
        $imagename = time().'_logo.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/logo/';
        $image->move($path, $imagename);
        $data->logo = $path.$imagename;

        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->whatsapp = $request->whatsapp;
        $data->whatsapp_link = $request->whatsapp_link;
        $data->facebook_link = $request->facebook_link;
        $data->twitter_link = $request->twitter_link;
        $data->pintorest_link = $request->pintorest_link;
        $data->messenger_link = $request->messenger_link;
        $data->about = $request->about;
        $data->terms_condition = $request->terms_condition;
        $data->privacy_policy = $request->privacy_policy;
        $data->refund_policy = $request->refund_policy;
        $data->google_map_link = $request->google_map_link;

        $data->save();
        Toastr::success('Setting successfully create', 'Success');

        return redirect()->route('admin.settings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg,JPG',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'whatsapp'=>'required',
            'whatsapp_link'=>'required|url',
            'facebook_link'=>'required|url',
            'twitter_link'=>'required|url',
            'pintorest_link'=>'required|url',
            'messenger_link'=>'required|url',
            'about'=>'required',
            'terms_condition'=>'required',
            'privacy_policy'=>'required',
            'refund_policy'=>'required',
            'google_map_link'=>'required|url',
        ]);

        $data = Setting::findOrFail($id);
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->whatsapp = $request->whatsapp;
        $data->whatsapp_link = $request->whatsapp_link;
        $data->facebook_link = $request->facebook_link;
        $data->twitter_link = $request->twitter_link;
        $data->pintorest_link = $request->pintorest_link;
        $data->messenger_link = $request->messenger_link;
        $data->about = $request->about;
        $data->terms_condition = $request->terms_condition;
        $data->privacy_policy = $request->privacy_policy;
        $data->refund_policy = $request->refund_policy;
        $data->google_map_link = $request->google_map_link;

        if ($request->hasFile('image')) {

            if (file_exists(public_path($data->logo))) {
                unlink(public_path($data->logo));
            }

            $image = $request->file('logo');
            $imagename = time().'_logo.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/logo/';
            $image->move($path, $imagename);
            $img = $path.$imagename;


        }else{
            $img = $data->logo;
        }
        $data->logo = $img;
        $data->save();
        Toastr::success('Setting successfully updated', 'Success');

        return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        return redirect()->route('admin.settings.index');
    }
}
