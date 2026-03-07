<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email
    ]);

    return back()->with('success', 'Profile updated successfully');
}
}
