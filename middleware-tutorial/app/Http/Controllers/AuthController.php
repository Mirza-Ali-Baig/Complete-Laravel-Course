<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'You have successfully registered!');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
        }else{
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.home')->with('success', 'You have successfully logged in!');
            }
            return redirect()->route('home')->with('success', 'You have successfully logged in!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have successfully logged out!');
    }
}
