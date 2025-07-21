<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\Admin\AuthNeed;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create()
    {
        $users = User::all();
        return view('admin.users.my-users', compact('users'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = json_decode($request->ids);
        if (!$ids || !is_array($ids) || count($ids) == 0) {
            return back()->with('error', 'No users selected.');
        }

        User::whereIn('id', $ids)->delete();
        return back()->with('success', 'Selected users deleted.');
    }
//
//    public function store(Request $request)
//    {
//        // Validate form inputs
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:admins,email',
//            'password' => 'required|string|min:8',
//            'role_id' => 'required|exists:roles,id',
//        ]);
//
//        AuthNeed::permission('*')->role(['super_admin', 'admin']);
//
//        // Create new admin user
//        Admin::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//            'role_id' => $request->role_id,
//        ]);
//
//        return redirect()->route('admin.roles.index')->with('admin', 'New admin user created successfully.');
//    }
//
//    // Show edit form for admin user
//    public function edit($id)
//    {
//        $user = Admin::findOrFail($id);
//        $roles = Role::all();
//
//        return view('admin.users.edit', compact('user', 'roles'));
//    }
//
//    public function delete($id): RedirectResponse
//    {
//        $currentAdmin = Auth::guard('admin')->user();
//
//        AuthNeed::permission('*')->role(['super_admin', 'admin']);
//        $user = Admin::findOrFail($id);
//       // dd($user->role->name);
//
//        if ($currentAdmin->id === $user->id || $user->role->name === "super_admin") {
//            return redirect()->back()->with('admin', 'Could not delete this user.');
//        }
//         $user->delete();
//        return redirect()->back()->with('admin', 'Admin user deleted successfully.');
//
//    }
//
//    // Update admin user
//    public function update(Request $request, $id)
//    {
//        AuthNeed::permission('*')->role(['super_admin', 'admin']);
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:admins,email,' . $id,
//            'role_id' => 'required|exists:roles,id',
//        ]);
//
//        $user = Admin::findOrFail($id);
//        $user->update($request->only('name', 'email', 'role_id'));
//
//        return redirect()->route('admin.roles.index')->with('admin', 'Admin user updated successfully.');
//    }


}
