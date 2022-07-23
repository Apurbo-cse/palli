<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'details' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $data = new Blog();
        $data->title = $request->title;
        $data->details = $request->details;

        $image = $request->file('image');
        $imagename = time().'_blog.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/blog/';
        $image->move($path, $imagename);
        $data->image = $path.$imagename;
        $data->status = $request->status;
        $data->save();
        Toastr::success('Blog successfully create', 'Success');
        return redirect()->route('admin.blog.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status' => 'required',
        ]);

        $blog= Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->details = $request->details;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'_blog.'.$file->getClientOriginalExtension();

            if (file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            $path = 'assets/admin/images/blog/';
            $file->move($path, $fileName);
            $blog_path = $path.$fileName;
        }else{
            $blog_path = $blog->image;
        }
        $blog->image = $blog_path;
        $blog->status = $request->status;

        $blog->save();
        Toastr::success('Blog successfully updated', 'Success');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if (file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        $blog->delete();
        Toastr::success('Blog successfully deleted', 'Success');
        return redirect()->route('admin.blog.index');
    }
}
