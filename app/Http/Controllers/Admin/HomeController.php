<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // dashboard
    public function index()
    {
        return view('home');
    }
    // Profile
    public function changeProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('auth.admin.settings.profile', ['user' => $user]);
    }
    // update profile
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'nullable|min:2|unique:users,username,' . $id,
            'avatar' => 'nullable|image|max:1024',
            'working' => 'required|string|min:2',
            'university' => 'nullable|string|min:5',
            'phone' => 'required|numeric|min_digits:9',
            'country' => 'required|string|min:4',
            'region' => 'required|string|min:4',
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'working' => $request->working,
            'university' => $request->university,
            'phone' => $request->phone,
            'country' => $request->country,
            'region' => $request->region,
        ]);

        // Update avatar jika ada yang diunggah
        if ($request->hasFile('avatar')) {
            // Hapus gambar lama jika ada
            if ($user->avatar && Storage::exists('public/photos/' . $user->avatar)) {
                Storage::delete('public/photos/' . $user->avatar);
            }
            $file = $request->file('avatar');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/photos'), $fileName);
            $user->avatar = $fileName;
        }
        $user->save();
        return back()->with('success', 'Profile updated!');
    }
    // Password
    public function changePassword()
    {
        return view('auth.admin.settings.change-password');
    }
    // UpdatePassword
    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }
}
