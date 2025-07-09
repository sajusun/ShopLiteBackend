<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:admins,email',
            'password'  => 'required|string|min:8',
            'role_id'   => 'required|exists:roles,id',
        ]);


        // Create new admin user
        Admin::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $request->role_id,
        ]);

        return redirect()->route('admin.roles.index')->with('admin', 'New admin user created successfully.');
    }
    // Show edit form for admin user
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function delete($id)
    {
        $user = Admin::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('admin', 'Admin user deleted successfully.');
    }

    // Update admin user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = Admin::findOrFail($id);
        $user->update($request->only('name', 'email', 'role_id'));

        return redirect()->route('admin.roles.index')->with('admin', 'Admin user updated successfully.');
    }
    public function changeRole(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = Admin::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->back()->with('role', 'Role updated successfully.');
    }

}
