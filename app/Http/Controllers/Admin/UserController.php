<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-user|create-user|edit-user|delete-user', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        $data = User::latest()->paginate(5);
        return view('auth.admin.users.index', compact('data'));
    }
    public function create()
    {
        //
        $user = User::findOrFail(Auth::id());
        $roles = Role::pluck('name', 'name')->all();
        return view('auth.admin.users.create', compact('roles', 'user'));
    }

    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|email|unique:users,email',
                'username' => 'nullable|min:2|unique:users,username',
                'password' => 'required|same:confirm-password|min_digits:8',
                'avatar' => 'nullable|image|max:1024',
                'working' => 'nullable|string|min:2',
                'university' => 'nullable|string|min:5',
                'phone' => 'nullable|numeric|min_digits:9',
                'address' => 'nullable|string|min:4',
                'country' => 'nullable|string|min:4',
                'region' => 'nullable|string|min:4',
                'roles' => 'required'
            ]
        );
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input = $request->all();
        // Unggah avatar jika ada yang diunggah
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/photos'), $fileName);
            $input['avatar'] = $fileName;
        }
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        //
        $roles = Role::findOrFail($id);
        $user = User::findOrFail($id);
        return view('auth.admin.users.show', compact('user', 'roles'));
    }

    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('auth.admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate(
            [
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|email|unique:users,email,' . $id,
                'username' => 'nullable|min:2|unique:users,username,' . $id,
                'password' => 'same:confirm-password',
                'avatar' => 'nullable|image|max:1024',
                'working' => 'nullable|string|min:2',
                'university' => 'nullable|string|min:5',
                'phone' => 'nullable|numeric|min_digits:9',
                'address' => 'nullable|string|min:4',
                'country' => 'nullable|string|min:4',
                'region' => 'nullable|string|min:4',
                'roles' => 'required'
            ]
        );
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::findOrFail($id);
        // Update avatar jika ada yang diunggah
        if ($request->hasFile('avatar')) {
            // Hapus gambar lama jika ada
            if ($user->avatar && Storage::exists('public/photos/' . $user->avatar)) {
                Storage::delete('public/photos/' . $user->avatar);
            }
            $file = $request->file('avatar');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/photos'), $fileName);
            $input['avatar'] = $fileName;
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->back()
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::delete('public/photos/' . $user->avatar);
        $user->delete($id);
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
    // Change Profule Profile
    public function changeProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('auth.admin.settings.profile', ['user' => $user]);
    }
    // Update profile
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'nullable|min:2|unique:users,username,' . $id,
            'avatar' => 'nullable|image|max:1024',
            'working' => 'nullable|string|min:2',
            'university' => 'nullable|string|min:5',
            'phone' => 'nullable|numeric|min_digits:9',
            'address' => 'nullable|string|min:4',
            'country' => 'nullable|string|min:4',
            'region' => 'nullable|string|min:4',
        ]);
        $user = User::findOrFail($id);
        $input = $request->all();
        // Update avatar jika ada yang diunggah
        if ($request->hasFile('avatar')) {
            // Hapus gambar lama jika ada
            if ($user->avatar && Storage::exists('public/photos/' . $user->avatar)) {
                Storage::delete('public/photos/' . $user->avatar);
            }
            $file = $request->file('avatar');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/photos'), $fileName);
            $input['avatar'] = $fileName;
        }
        $user->update($input);
        return back()->with('success', 'Profile updated!');
    }
    // Change Password
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
