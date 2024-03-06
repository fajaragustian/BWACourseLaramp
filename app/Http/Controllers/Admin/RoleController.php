<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Permission Access
    public function __construct()
    {
        $this->middleware('permission:list-role|create-role|edit-role|delete-role', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-role', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }
    // Role
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(5);
        return view('auth.admin.roles.index', compact('roles'));
    }
    // Create view with role
    public function create()
    {
        $permission = Permission::get();
        return view('auth.admin.roles.create', compact('permission'));
    }
    // Request create with role
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));
        $permissions = $request->input('permission');
        // Type int agar bisa di olah maka digunakan keadalam array
        $permissions = array_map(function ($item) {
            return (int)$item;
        }, $permissions);
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }
    // Show view with role
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('auth.admin.roles.show', compact('role', 'rolePermissions'));
    }
    // Edit view with role
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('auth.admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    // Request update with role
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        // $role->syncPermissions($request->input('permission'));
        $permissions = $request->input('permission');
        $permissions = array_map(function ($item) {
            return (int)$item;
        }, $permissions);
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
    // Request delete with role
    public function destroy($id)
    {
        $role  = Role::findOrFail($id);
        $role->delete();
        // DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
