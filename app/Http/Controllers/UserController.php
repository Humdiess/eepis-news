<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * List user
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function($query) use ($search){

            $query->where('name', 'like', "%{$search}%");

        })

        ->latest()
        ->paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * Form create user
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store user
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

            'role' => 'required'

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role

        ]);

        return redirect()->route('users.index');
    }

    /**
     * Form edit user
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email',

            'role' => 'required'

        ]);

        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role

        ]);

        return redirect()->route('users.index');
    }

    /**
     * Delete user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}