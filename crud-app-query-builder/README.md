# Laravel CRUD Application Tutorial

## Overview

This tutorial will guide you through creating a simple CRUD (Create, Read, Update, Delete) application using Laravel query builder. We'll build an application that manages employee records, complete with database migrations, data factories, and more.

## Prerequisites

Ensure you have the following installed:

- [PHP](https://www.php.net/downloads) (7.4 or higher)
- [Composer](https://getcomposer.org/download/)
- [Laravel](https://laravel.com/docs) (8.x or higher)
- [MySQL](https://dev.mysql.com/downloads/) or [MariaDB](https://mariadb.org/download/)

## Step 1: Create a New Laravel Application

1. **Install Laravel via Composer**

   Open your terminal and run:

   ```bash
   composer create-project --prefer-dist laravel/laravel laravel-crud-application
   ```

Navigate into the project directory:

   ```bash
   cd laravel-crud-application
   ```

1. **Set Up Environment Variables**

   Edit the `.env` file to configure your database connection:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

## Step 2: Create the Employee Table

1. **Generate Migration**

   Run the following artisan command to create a migration file:

   ```bash
   php artisan make:migration create_employees_table
   ```

2. **Define the Migration Schema**

   Open the generated migration file located in `database/migrations/` and define the schema:

   ```php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class CreateEmployeesTable extends Migration
   {
       public function up()
       {
           Schema::create('employees', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->string('email')->unique();
               $table->string('position');
               $table->decimal('salary', 10, 2);
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('employees');
       }
   }
   ```

3. **Run Migrations**

   Apply the migration to create the `employees` table:

   ```bash
   php artisan migrate
   ```

## Step 3: Set Up the Factory for Fake Data

1. **Create a Factory**

   Generate a factory for the `Employee` model:

   ```bash
   php artisan make:factory EmployeeFactory --model=Employee
   ```

2. **Define the Factory**

   Open the factory file in `database/factories/EmployeeFactory.php` and define the fake data:

   ```php
   namespace Database\Factories;

   use App\Models\Employee;
   use Illuminate\Database\Eloquent\Factories\Factory;

   class EmployeeFactory extends Factory
   {
       protected $model = Employee::class;

       public function definition()
       {
           return [
               'name' => $this->faker->name,
               'email' => $this->faker->unique()->safeEmail,
               'position' => $this->faker->jobTitle,
               'salary' => $this->faker->randomFloat(2, 30000, 90000),
           ];
       }
   }
   ```

3. **Seed the Database**

   Create a seeder:

   ```bash
   php artisan make:seeder EmployeeSeeder
   ```

   Define the seeder in `database/seeders/EmployeeSeeder.php`:

   ```php
   namespace Database\Seeders;

   use Illuminate\Database\Seeder;
   use Illuminate\Support\Facades\DB;
   use App\Models\Employee;

   class EmployeeSeeder extends Seeder
   {
       public function run()
       {
           Employee::factory()->count(50)->create();
       }
   }
   ```

   Run the seeder:

   ```bash
   php artisan db:seed --class=EmployeeSeeder
   ```

## Step 4: Create the Controller

1. **Generate Controller**

   Create a controller for managing employees:

   ```bash
   php artisan make:controller EmployeeController
   ```

2. **Define CRUD Operations**

   Open `app/Http/Controllers/EmployeeController.php` and add CRUD methods using query builder:

   ```php
   namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\DB;

   class EmployeeController extends Controller
   {
       public function index()
       {
           $employees = DB::table('employees')->get();
           return view('employees.index', compact('employees'));
       }

       public function create()
       {
           return view('employees.create');
       }

       public function store(Request $request)
       {
           DB::table('employees')->insert([
               'name' => $request->input('name'),
               'email' => $request->input('email'),
               'position' => $request->input('position'),
               'salary' => $request->input('salary'),
           ]);
           return redirect()->route('employees.index');
       }

       public function show($id)
       {
           $employee = DB::table('employees')->where('id', $id)->first();
           return view('employees.show', compact('employee'));
       }

       public function edit($id)
       {
           $employee = DB::table('employees')->where('id', $id)->first();
           return view('employees.edit', compact('employee'));
       }

       public function update(Request $request, $id)
       {
           DB::table('employees')->where('id', $id)->update([
               'name' => $request->input('name'),
               'email' => $request->input('email'),
               'position' => $request->input('position'),
               'salary' => $request->input('salary'),
           ]);
           return redirect()->route('employees.index');
       }

       public function destroy($id)
       {
           DB::table('employees')->where('id', $id)->delete();
           return redirect()->route('employees.index');
       }
   }
   ```

## Step 5: Define Routes

1. **Add Routes**

   Open `routes/web.php` and define the routes:

   ```php
   use App\Http\Controllers\EmployeeController;

   Route::resource('employees', EmployeeController::class);
   ```

## Step 6: Create Views

1. **Create Blade Templates**

   Create views in `resources/views/employees/`:

    - `index.blade.php` - List of employees
    - `create.blade.php` - Form to create a new employee
    - `edit.blade.php` - Form to edit an existing employee
    - `show.blade.php` - Show details of an employee

   Example of `index.blade.php`:

   ```blade
   <!DOCTYPE html>
   <html>
   <head>
       <title>Employee List</title>
   </head>
   <body>
       <h1>Employees</h1>
       <a href="{{ route('employees.create') }}">Add New Employee</a>
       <ul>
           @foreach ($employees as $employee)
               <li>
                   <a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a>
                   <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                   <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                       @csrf
                       @method('DELETE')
                       <button type="submit">Delete</button>
                   </form>
               </li>
           @endforeach
       </ul>
   </body>
   </html>
   ```

## Folder Structure

Here's an overview of the folder structure:

- `app/Http/Controllers/` - Contains controller files
- `database/migrations/` - Contains migration files
- `database/factories/` - Contains factory files
- `database/seeders/` - Contains seeder files
- `resources/views/employees/` - Contains Blade templates for employee views
- `routes/web.php` - Defines web routes

## Artisan Commands

Here are some useful artisan commands:

- **Generate a new model, migration, and factory:**

  ```bash
  php artisan make:model Employee -m -f
  ```

- **Run migrations:**

  ```bash
  php artisan migrate
  ```

- **Seed the database:**

  ```bash
  php artisan db:seed
  ```

- **Start the development server:**

  ```bash
  php artisan serve
  ```

## Conclusion

You've now set up a Laravel CRUD application with an `Employee` table. This tutorial covered creating a new Laravel application, setting up migrations, using factories for generating fake data, creating a controller for CRUD operations, and defining routes and views.

