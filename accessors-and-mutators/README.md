# Accessors and Mutators in Laravel

## Overview

Accessors and mutators are powerful features in Laravel that allow you to format attributes when they are retrieved from the database (accessors) and modify attributes before they are saved to the database (mutators).

1. Setting up a Laravel application.
2. Creating an `Employee` model and migration.
3. Using accessors and mutators.
4. Creating a Blade view to display employee data in a Bootstrap-styled table.

## Step 1: Setting Up the Laravel Application

Create a new Laravel application:

```bash
composer create-project --prefer-dist laravel/laravel employee-example
```

## Step 2: Create the Employee Model and Migration

Generate the `Employee` model and its corresponding migration:

```bash
php artisan make:model Employee -m
```

## Step 3: Define the Migration

Edit the migration file for the `employees` table located in `database/migrations/xxxx_xx_xx_create_employees_table.php`:

```php
public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->date('dob');
        $table->decimal('salary', 10, 2);
        $table->timestamps();
    });
}
```

Run the migration to create the `employees` table:

```bash
php artisan migrate
```

## Step 4: Define Accessors and Mutators

Open the `Employee` model (`app/Models/Employee.php`) and add accessors and mutators:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Number;

class Employee extends Model
{
    protected $guarded = [];

    protected function getNameAttribute($value): string
    {
        return ucwords($value);
    }
    protected function getEmailAttribute($value): string
    {
        return strtolower($value);
    }
    protected function getDobAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    protected function getSalaryAttribute($value): string
    {
        return Number::currency($value);
    }
}

```

## Step 5: Create a Controller

Generate a controller for managing employees:

```bash
php artisan make:controller EmployeeController
```

### Implement the Index Method

Open the `EmployeeController` (`app/Http/Controllers/EmployeeController.php`) and implement the index method:

```php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }
}
```

## Step 6: Create the Blade View

Create a Blade view to display the employee data. Create a new file in `resources/views/employees/index.blade.php`:

```blade
<h1>Employee Data</h1>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->dob }}</td>
                <td>{{ $employee->salary }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
```

[//]: # (## Step 7: Create a Layout with Bootstrap)

[//]: # ()
[//]: # (Create a layout file in `resources/views/layouts/app.blade.php` to include Bootstrap:)

[//]: # ()
[//]: # (```blade)

[//]: # (<!DOCTYPE html>)

[//]: # (<html lang="en">)

[//]: # (<head>)

[//]: # (    <meta charset="UTF-8">)

[//]: # (    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">)

[//]: # (    <title>Employee Data</title>)

[//]: # (    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">)

[//]: # (</head>)

[//]: # (<body>)

[//]: # (    <div class="container mt-5">)

[//]: # (        @yield&#40;'content'&#41;)

[//]: # (    </div>)

[//]: # (</body>)

[//]: # (</html>)

[//]: # (```)

## Step 7: Define a Route

Define a route for the `index` method in your `routes/web.php` file:

```php
use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'welcome']);
```

## Step 8: Testing the Application

You can now run your Laravel application:

```bash
php artisan serve
```

Visit `http://localhost:8000/` in your web browser. You should see the employee data displayed in a styled Bootstrap table.

## Conclusion

In this tutorial, you learn how to create a simple Laravel application that manages employee data. You implemented accessors and mutators for the `Employee` model, created a controller to fetch employee data, and displayed it in a Bootstrap-styled table using Blade templating.

