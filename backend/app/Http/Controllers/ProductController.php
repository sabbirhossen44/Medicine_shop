<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.productList',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.newProduct',[
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'power' => 'required',
            'name' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);
        $photo = $request->file('photo');
        $photo_name = 'Product_' . time() . uniqid() . '.' . $photo->getClientOriginalExtension() ;
        $photo->move(public_path('uploads/product/'),$photo_name);
        $remove = array("@", "#", "(", ")", "*", "/", " ", '""');
        $slug = Str::lower(str_replace($remove, "_", $request->name)) . time() . uniqid();
        Product::insert([
            'product_name' => $request->name,
            'power' => $request->power,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'after_discount' => $request->price - ($request->price * $request->discount / 100),
            'slug' => $slug,
            'photo' => $photo_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('product_add', 'Product added Successfully');
    }

  
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
