<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->paginate(8);
        $recent_blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->limit(8)->get();
        return view('frontend.blog', compact('blogs', 'recent_blogs'));
    }
    public function details($id){
        $blog = Blog::findOrFail($id);
        $recent_blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->limit(6)->get();
        return view('frontend.blogDetails', compact('blog', 'recent_blogs'));
    }
}
