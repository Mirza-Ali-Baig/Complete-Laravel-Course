<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('users.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
//        $user = new User();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->save();
        // or
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => $request->password,
         ]);
        return redirect()->route('users.index');
    }


    public function show($id): \Illuminate\Contracts\View\View
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id): \Illuminate\Contracts\View\View
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
//        or
//        $user = new User();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->delete();
        // or
//        $user->destroy($id);
        return redirect()->route('users.index');
    }
}
