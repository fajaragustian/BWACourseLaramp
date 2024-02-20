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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::latest()->paginate(5);
        return view('auth.admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::findOrFail(Auth::id());
        $roles = Role::pluck('name', 'name')->all();
        return view('auth.admin.users.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|email|unique:users,email',
                'username' => 'nullable|min:2|unique:users,username',
                'password' => 'required|same:confirm-password|min_digits:8',
                'avatar' => 'nullable|image|max:1024',
                'working' => 'required|string|min:2',
                'university' => 'nullable|string|min:5',
                'phone' => 'required|numeric|min_digits:9',
                'country' => 'required|string|min:4',
                'region' => 'required|string|min:4',
                'roles' => 'required'
            ]
        );
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $roles = Role::find($id);
        $user = User::find($id);
        return view('auth.admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('auth.admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|email|unique:users,email,' . $id,
                'username' => 'nullable|min:2|unique:users,username,' . $id,
                'password' => 'same:confirm-password',
                'avatar' => 'nullable|image|max:1024',
                'working' => 'required|string|min:2',
                'university' => 'nullable|string|min:5',
                'phone' => 'required|numeric|min_digits:9',
                'country' => 'required|string|min:4',
                'region' => 'required|string|min:4',
                'roles' => 'required'
            ]
        );

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
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
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
