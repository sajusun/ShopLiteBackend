<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        $adminUsers=Admin::all();
        return view('admin.roles.index', compact('roles', 'permissions','adminUsers'));
    }

    public function update(Request $request, Role $role)
    {
        $permissions = $request->input('permissions', []);

        foreach ($permissions as $roleId => $permissionIds) {
            $role = Role::find($roleId);
            if ($role) {
                $role->permissions()->sync($permissionIds);
            }
        }

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }

}
