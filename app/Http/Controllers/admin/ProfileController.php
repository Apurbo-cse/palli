<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user_info = Auth::user();
        return view('admin.profile.index', compact('user_info'));
    }

    public function edit()
    {
        $user_info = Auth::user();
        return view('admin.profile.edit', compact('user_info'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'_slider.'.$image->getClientOriginalExtension();
            $path = 'assets/admin/images/';

            if ($user->image != null)
            {
                if (file_exists(public_path($user->image))) {
                    unlink(public_path($user->image));
                }
            }

            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $user->image;
        }
        $user->image = $img;
        $user->save();
        Toastr::success('User information successfully updated', 'Success');
        return redirect()->route('admin.profile');
    }

    public function passwordEdit()
    {
        return view('admin.password.edit');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_pass'=>'required',
            'password' => 'required|confirmed|min:8',
        ]);
        $hashPassword = Auth::user()->password;
        if (Hash::check($request->old_pass, $hashPassword))
        {
            if (!Hash::check($request->password, $hashPassword))
            {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->update();
                Auth::logout();
                Toastr::success('Your password successfully Updated', 'Success');
                return redirect()->back();

            }else{
                Toastr::error('New password same as old password', 'Error');
                return redirect()->back();
            }
        }else{
            Auth::logout();
            Toastr::error('Please enter correct password', 'Error');
            return redirect()->back();
        }
    }
}
