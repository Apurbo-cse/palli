<?php

namespace App\Http\Controllers;

use App\About;
use App\Artisan;
use App\ArtisanInfo;
use App\Category;
use App\FairTrade;
use App\Material;
use App\MaterialInfo;
use App\Membership;
use App\Product;
use App\Setting;
use App\Slider;
use App\SubCategory;
use App\Video;
use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $featuredCategories = Category::where('status', '1')->limit(3)->get();
        $hotItems = Product::where('tag_id', '1')->where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price','image'])->limit(10)->get();
        $latestItems = Product::where('status', '1')->orderBy('id', 'DESC')->limit(6)->select(['id', 'title', 'offer_price','image'])->get();
        $products = Product::where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image', 'category_id', 'stock', 'tag_id'])->orderBy('id', 'desc')->limit(20)->get();
        $blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.home', compact('sliders','featuredCategories', 'hotItems', 'latestItems', 'products', 'blogs'));
    }

    public function about()
    {
        $about_us = Setting::select('about')->first();
        $about_info = About::first();
        $memberships = Membership::where('status', '1')->orderBy('title', 'ASC')->get();
        return view('frontend.about', compact('about_us', 'about_info', 'memberships'));
    }
    public function artisans()
    {
        $artisans = Artisan::where('status', '1')->get();
        $artisanInfo = ArtisanInfo::first();
        return view('frontend.artisans', compact('artisans', 'artisanInfo'));
    }

    public function video()
    {
        $videos = Video::where('status', '1')->get();
        return view('frontend.video', compact('videos'));
    }

    public function fairTrade()
    {
        $fairTrades = FairTrade::where('status', '1')->get();
        return view('frontend.fairTrade', compact('fairTrades'));
    }

    public function material()
    {
        $materialInfo = MaterialInfo::first();
        $materials= Material::where('status', '1')->get();
        return view('frontend.material', compact('materialInfo', 'materials'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }
    public function categoryProduct($id)
    {
        $products = Product::where('category_id', $id)->where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image'])->orderBy('id', 'desc')->paginate(9);
        $newProducts = Product::where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image'])->orderBy('id', 'desc')->limit(3)->get();
        return view('frontend.category', compact('products', 'newProducts'));
    }

    public function subcategoryProduct($id)
    {
        $products = Product::where('subcategory_id', $id)->where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image'])->orderBy('id', 'desc')->paginate(9);
        $newProducts = Product::where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image'])->orderBy('id', 'desc')->limit(3)->get();
        return view('frontend.category', compact('products', 'newProducts'));
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function contact()
    {
        $contact_us = Setting::select(['phone', 'email', 'address', 'google_map_link'])->first();
        return view('frontend.contact', compact('contact_us'));
    }
    public function productDetails($id)
    {
        $product = Product::where('id', $id)->first();
        $contactInfo = Setting::find(1, ['whatsapp_link', 'email']);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('status', '1')->orderBy('id', 'DESC')->limit(6)->select(['id', 'title', 'offer_price','image', 'regular_price'])->whereId('id', '==', $product->id)->get();
        return view('frontend.product_details', compact('product', 'relatedProducts', 'contactInfo'));
    }

    public function productList()
    {
        $products = Product::where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image', 'image_two', 'category_id', 'stock', 'tag_id'])->orderBy('id', 'desc')->paginate(9);
        $newProducts = Product::where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image'])->orderBy('id', 'desc')->limit(3)->get();
        $categories = Category::where('status', '1')->get();
        $subcategories = SubCategory::where('status', '1')->get();
        return view('frontend.product_list', compact('products', 'categories', 'subcategories', 'newProducts'));
    }

    public function user()
    {
        return view('frontend.user');
    }

    public function search(Request $request)
    {
        if ($request->category == "all")
        {
            $products = Product::where('status', '1')->where('title', 'like', '%'.$request->search.'%')->orWhere('short_desc', 'like', '%'.$request->search.'%')->orWhere('details', 'like', '%'.$request->search.'%')->select(['id', 'title', 'offer_price', 'regular_price', 'image', 'image_two', 'category_id', 'stock', 'tag_id'])->orderBy('id', 'desc')->paginate(9);
        }else{
            $products = Product::where('category_id', $request->category)->where('status', '1')->where('title', 'like', '%'.$request->search.'%')->orWhere('short_desc', 'like', '%'.$request->search.'%')->orWhere('details', 'like', '%'.$request->search.'%')->select(['id', 'title', 'offer_price', 'regular_price', 'image', 'image_two', 'category_id', 'stock', 'tag_id'])->orderBy('id', 'desc')->paginate(9);
        }
        $newProducts = Product::where('status', '1')->select(['id', 'title', 'offer_price', 'regular_price', 'image'])->orderBy('id', 'desc')->limit(4)->get();
        return view('frontend.search',compact('products', 'newProducts'));
    }
}

