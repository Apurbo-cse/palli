<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Newsletter::orderBy('id', 'DESC')->get();
        return view('admin.newsletter.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscription = Newsletter::findOrFail($id);
        if ($subscription->status)
        {
            $st = "0";
        }else{
            $st = "1";
        }
        $subscription->status = $st;
        $subscription->save();
        Toastr::success('Subscription successfully updated', 'Success');
        return redirect()->route('admin.newsletter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Newsletter::findOrFail($id)->delete();
        Toastr::success('Subscription successfully deleted', 'Success');
        return redirect()->route('admin.newsletter.index');
    }
}
