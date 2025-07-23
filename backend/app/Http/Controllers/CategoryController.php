<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('admin.category.index',[
            'categories' => $categories,
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
            'name' => 'required|unique:categories,category_name',
            'icon' => 'required',
        ]);


        $photo = $request->file('icon');
        $photo_name = 'category'. time() . uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/category/'), $photo_name);
        Category::insert([
            'category_name'  => $request->name,
            'icon' => $photo_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('category_add', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
    public function category_delete($id){
        $category = Category::find($id);
        $old_photo = public_path('uploads/category/'.$category->icon);
        if (file_exists($old_photo )) {
            unlink($old_photo );
        }
        $category->delete();
        return back()->with('category_delete','Category Deleted Successfully!');
    }
}
