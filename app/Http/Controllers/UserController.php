<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

        $data=['name' => $request->name,
        'email' => $request->email];
        if ($request->filled('password'))
        {
        $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
    return back()->with('success', 'Profile updated successfully');
}
}
