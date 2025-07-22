<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile.profile', [
            'admin' => $admin
        ]);
    }
    public function info_update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('info_update', 'Profile Info Updated');
    }
    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),
            ]);
            return back()->with('password_update', 'Password updated successfully!');
        } else {
            return back()->with('password_not_match', 'Old password not match!');
        }
    }
    public function photo_update(Request $request){
        $request->validate([
            'photo' => 'required'
        ]);
        $admin = Auth::user();
        $public_path = public_path('uploads/admin/'.$admin->photo);
        if ($admin->photo && file_exists($public_path)) {
            unlink($public_path);
        }
        $photo = $request->file('photo');
        $photo_name = "admin_". time() . uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/admin'), $photo_name);
        User::where('id', $admin->id)->update([
            'photo' => $photo_name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('photo', 'Photo updated successfully!');
    }
}
