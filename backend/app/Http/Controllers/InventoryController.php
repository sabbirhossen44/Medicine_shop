<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventroy_list($id){
        $product = Product::find($id);
        return view('admin.inventory.index',[
            'product' => $product,
        ]);
    }
}
