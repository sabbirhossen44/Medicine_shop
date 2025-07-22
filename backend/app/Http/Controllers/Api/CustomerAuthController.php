<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
        ]);

        try {
            $customer = Customer::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // $token = $customer->createToken('CustomerToken')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Customer registered successfully',
                'customer' => $customer
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'false',
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::where('email', $validated['email'])->first();

        if (!$customer || !Hash::check($validated['password'], $customer->password)) {
            return response()->json([
                'status' => 'false',
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $customer->createToken('CustomerToken')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'token' => $token,
            'customer' => $customer
        ]);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'status'=> 'success',
            'message' => 'Logged out Successfully!'
        ]);
    }
}
