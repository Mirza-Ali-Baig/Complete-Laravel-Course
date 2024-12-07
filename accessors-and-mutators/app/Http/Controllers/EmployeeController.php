<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('welcome', compact('employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([

        ]);

        return Employee::create($data);
    }

    public function show(Employee $employee)
    {
        return $employee;
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([

        ]);

        $employee->update($data);

        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json();
    }
}
