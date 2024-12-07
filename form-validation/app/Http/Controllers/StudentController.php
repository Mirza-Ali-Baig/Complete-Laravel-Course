<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request): array
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|max:12',
            'gender' => 'required|in:male,female,others',
            'age' => 'required|between:18,60',
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'phone.required' => 'Phone is required',
            'gender.required' => 'Gender is required',
            'age.required' => 'Age is required',
        ]
        );
        return $request->all();
    }

    public function showStudentForm(): \Illuminate\Contracts\View\View
    {
        return view('student');
    }
    public function storeStudentForm(StudentRequest $request): array
    {
        return $request->all();
    }
}
