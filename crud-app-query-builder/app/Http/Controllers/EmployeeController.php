<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
   public function index(): \Illuminate\Contracts\View\View
   {
       $employees = DB::table('employees')->get();
       return view('index', compact('employees'));
   }
   public function create(): \Illuminate\Contracts\View\View
   {
       return view('create');
   }
   public function store(Request $request): \Illuminate\Http\RedirectResponse
   {
       $employee = DB::table('employees')->insert([
           'name' => $request->name,
           'email' => $request->email,
           'position' => $request->position,
           'phone' => $request->phone,
           'age' => $request->age,
           'salary' => $request->salary,
       ]);
       return redirect()->route('employees.home')->with('success', 'Employee created successfully');
   }
   public function edit($id): \Illuminate\Contracts\View\View
   {
       $employee = DB::table('employees')->find($id);
       return view('edit', compact('employee'));
   }
   public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
   {
       $employee = DB::table('employees')->find($id);
       $employee->update([
           'name' => $request->name,
           'email' => $request->email,
           'position' => $request->position,
           'phone' => $request->phone,
           'age' => $request->age,
           'salary' => $request->salary,
       ]);
       return redirect()->route('employees.home')->with('success', 'Employee updated successfully');
   }
   public function delete($id): \Illuminate\Http\RedirectResponse
   {
       $employee = DB::table('employees')->find($id);
       $employee->delete();
       return redirect()->route('employees.home')->with('success', 'Employee deleted successfully');
   }
}
