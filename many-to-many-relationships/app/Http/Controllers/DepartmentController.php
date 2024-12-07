<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function index()
    {
        return Department::with('employees')->get();
    }

    function create()
    {
        Department::create(['name' => 'HR']);
        Department::create(['name' => 'IT']);
        Department::create(['name' => 'Sales']);
        Department::create(['name' => 'Marketing']);
        Department::create(['name' => 'Finance']);
        echo 'Created';
    }
}
