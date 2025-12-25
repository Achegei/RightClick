<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::with('role')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Show create form
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'role_id'  => 'required|exists:roles,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'role_id'  => $validated['role_id'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }

    // Show edit form
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update existing user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role_id'  => 'required|exists:roles,id',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}
