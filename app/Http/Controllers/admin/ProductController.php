<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','1')->orderBy('name', 'ASC')->get();
        $subcategories = SubCategory::where('status','1')->orderBy('name', 'ASC')->get();
        $tags = Tag::where('status','1')->orderBy('name', 'ASC')->get();

        return view('admin.product.create', compact('categories', 'subcategories', 'tags'));
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
            'short_desc' => 'required',
            'details' => 'required',
            'regular_price' => 'required',
            'offer_price' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'is_featured' => 'required',
            'status' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'image_two' => 'required|mimes:jpeg,png,jpg,JPG',
            'image_three' => 'mimes:jpeg,png,jpg,JPG',

        ]);

        $data = new Product();
        $data->title = $request->title;
        $data->short_desc = $request->short_desc;
        $data->details = $request->details;
        $data->regular_price = $request->regular_price;
        $data->offer_price = $request->offer_price;
        $data->stock = $request->stock;
        $data->size = $request->size;
        $data->is_featured = $request->is_featured;
        $data->status = $request->status;
        $data->tag_id = $request->tag_id;
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;

        $time = time();


        $image = $request->file('image');
        $imagename = $time.'_product_one.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/product/';
        $image->move($path, $imagename);
        $data->image = $path.$imagename;

        $image = $request->file('image_two');
        $imagename_two= $time.'_product_two.'.$image->getClientOriginalExtension();
        $path = 'assets/admin/images/product/';
        $image->move($path, $imagename_two);
        $data->image_two = $path.$imagename_two;

        if ($request->hasFile('image_three')) {
            $image = $request->file('image_three');
            $imagename_three = $time. '_product_three.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/product/';
            $image->move($path, $imagename_three);
            $data->image_three = $path . $imagename_three;
        }

        $data->save();
        Toastr::success('Product successfully create', 'Success');
        return redirect()->route('admin.products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status','1')->orderBy('name', 'ASC')->get();
        $subcategories = SubCategory::where('status','1')->orderBy('name', 'ASC')->get();
        $tags = Tag::where('status','1')->orderBy('name', 'ASC')->get();

        return view('admin.product.edit', compact('categories', 'subcategories', 'tags', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'details' => 'required',
            'regular_price' => 'required',
            'offer_price' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'is_featured' => 'required',
            'status' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'image_two' => 'mimes:jpeg,png,jpg,JPG',
            'image_three' => 'mimes:jpeg,png,jpg,JPG',

        ]);

        $data = Product::findOrFail($id);
        $data->title = $request->title;
        $data->short_desc = $request->short_desc;
        $data->details = $request->details;
        $data->regular_price = $request->regular_price;
        $data->offer_price = $request->offer_price;
        $data->stock = $request->stock;
        $data->size = $request->size;
        $data->is_featured = $request->is_featured;
        $data->status = $request->status;
        $data->tag_id = $request->tag_id;
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
        $time = time();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $time . '_product_one.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/product/';

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
            $imagename_two = $time . '_product_two.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/product/';

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
            $imagename_three = $time. '_product_three.' . $image->getClientOriginalExtension();
            $path = 'assets/admin/images/product/';

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
        Toastr::success('Product successfully udated', 'Success');
        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Product::findOrFail($id);

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
        Toastr::success('Product successfully deleted', 'Success');
        return redirect()->route('admin.products.index');
    }
}
