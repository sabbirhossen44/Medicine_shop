<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function user_list(){
        $customers = Customer::latest()->get();
        return view('admin.user.user_list',[
            'customers' => $customers,
        ]);
    }
    public function user_store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'number' => 'required',
            'photo' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $photo = $request->file('photo');
        $photo_name = "user_" . time() . uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/users'), $photo_name);
        Customer::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'number'=> $request->number,
            'password'=> bcrypt($request->password),
            'photo' => $photo_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('user_store', 'User Created Successfully');
    }
    public function user_edit($id){
        $customer = Customer::find($id);
        // return $customer;
        return view('admin.user.edit', [
            'customer' => $customer,
        ]);
    }
}
