<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(15);
        return view('admin.brand.index',[
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,brand_name',
            'icon' => 'required',
        ]);


        $photo = $request->file('icon');
        $photo_name = 'category' . time() . uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/brand/'), $photo_name);
        Brand::insert([
            'brand_name'  => $request->name,
            'icon' => $photo_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('brand_add', 'Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function brand_delete($id){
        $brand = Brand::find($id);
        $old_photo = public_path('uploads/brand/'.$brand->icon);
        if (file_exists($old_photo )) {
            unlink($old_photo );
        }
        $brand->delete();
        return back()->with('brand_delete','Brand Deleted Successfully!');
    }
}
