<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * List user
     * + search
     * + pagination
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
     * Delete user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}