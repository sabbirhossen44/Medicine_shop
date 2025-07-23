<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return response()->json([
            'status' => 'ture',
            'message ' => 'Category Ges SuccessfullY!',
            'categories' => $categories,
        ]);
    }
}
