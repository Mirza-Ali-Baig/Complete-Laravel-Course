<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function index()
   {
    $users = User::with('companyInformation')->get();
    return response()->json($users);
   }

   function create() 
   {
     $user=User::create([
      'name' => "Amit",
      'email' => "amit@gmail.com",
      'password' => bcrypt('password'),
     ]);
     return response()->json($user);
   }
}
