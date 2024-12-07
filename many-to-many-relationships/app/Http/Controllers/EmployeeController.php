<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::with('departments')->get();
    }

    public function create()
    {
        Employee::create(['name' => 'Ahmed', 'email' => 'ahmed@example.com']);
        Employee::create(['name' => 'Mohamed', 'email' => 'mohamed@example.com']);
        Employee::create(['name' => 'Ali', 'email' => 'ali@example.com']);
        Employee::create(['name' => 'Ahmed', 'email' => 'ahmed2@example.com']);
        Employee::create(['name' => 'Mohamed', 'email' => 'mohamed2@example.com']);
        Employee::create(['name' => 'Ali', 'email' => 'ali2@example.com']);
        echo 'Created';
    }

    function assignDepartment(Employee $employee)
    {
//        $employee = Employee::find(1);
        $employee->departments()->attach(2);
        echo 'Assigned';
    }
}
