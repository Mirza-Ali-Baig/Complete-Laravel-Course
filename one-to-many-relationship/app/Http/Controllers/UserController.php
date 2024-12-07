<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function create()
    {
        User::create([
            'name' => "Ali",
            'email' => "8qS6x@example.com",
            'password' => Hash::make("12345678"),
        ]);

        return "User created";
    }

    public function getUsersWithPosts()
    {
        return User::with('posts')->get();
    }
}
