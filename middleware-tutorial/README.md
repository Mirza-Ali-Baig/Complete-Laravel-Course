# Tutorial: Role-Based Authentication in Laravel 11 Using Middleware

In this tutorial, we will create a role-based authentication system in Laravel 11 using middleware and the Auth class. We’ll also build a stunning UI using Tailwind CSS and apply validation to user inputs.

## What is Middleware?

Middleware in Laravel is a mechanism for filtering HTTP requests entering your application. It acts as a bridge between a request and a response and can be used for various purposes such as:

- **Authentication**: Verify if a user is authenticated.
- **Authorization**: Check if a user has the right permissions.
- **Logging**: Log requests or responses.
- **CORS**: Handle Cross-Origin Resource Sharing.

### Types of Middleware

1. **Global Middleware**: Applied to every HTTP request.
2. **Route Middleware**: Applied to specific routes.
3. **Middleware Groups**: A collection of middleware that can be applied together.

## Step 1: Set Up a New Laravel Application

### Create a New Laravel Application

Use Composer to create a new Laravel project:

```bash
composer create-project --prefer-dist laravel/laravel role-based-auth
```

### Change Directory

Navigate to your project folder:

```bash
cd role-based-auth
```

### Install Tailwind CSS

Use npm to install Tailwind CSS:

```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

### Configure Tailwind CSS

Edit the `tailwind.config.js` to include your template paths:

```javascript
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

### Add Tailwind Directives

Create a CSS file at `resources/css/app.css` and add the following:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

### Compile Assets

Run the following command to compile your assets:

```bash
npm run dev
```

## Step 2: Set Up the Database

### Configure the Database Connection

Open the `.env` file and set your database connection details:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Run Migrations

Run the migrations to create the users table:

```bash
php artisan migrate
```

## Step 3: Create Middleware for Role-Based Authentication

### Generate Middleware

You can create middleware using the Artisan command:

```bash
php artisan make:middleware RoleMiddleware
```

### Implement Middleware Logic

Open `app/Http/Middleware/RoleMiddleware.php` and add the following logic:

```php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            return redirect('/login');
        }

        return $next($request);
    }
}
```

## Step 4: Set Up Authentication Logic

### Generate Auth Controller

Create a controller for handling authentication:

```bash
php artisan make:controller AuthController
```

### Define Routes

Open `routes/web.php` and add the following routes:

```php
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(RoleMiddleware::class)->name('dashboard');
```

### Implement AuthController

Open `app/Http/Controllers/AuthController.php` and implement the authentication logic:

```php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|string', // Add role validation
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
```

## Step 5: Create Blade Views

### Create Layout

Create a layout file in `resources/views/layouts/app.blade.php`:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role-Based Auth Example</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0">
                        <a href="#" class="text-lg font-bold">Auth Example</a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            @if (auth()->check())
                                <a href="{{ route('dashboard') }}" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                                <a href="{{ route('register') }}" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-10">
        @yield('content')
    </div>
</body>
</html>
```

### Create Registration View

Create the registration view in `resources/views/auth/register.blade.php`:

```blade
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-md">
    <h1 class="text-center mb-6">Register</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Register</button>
    </form>
</div>
@endsection
```

### Create Login View

Create the login view in `resources/views/auth/login.blade.php`:

```blade
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-md">
    <h1 class="text-center mb-6">Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Login</button>
    </form>
</div>
@endsection
```

### Create Dashboard View

Create the dashboard view in `resources/views/dashboard.blade.php`:

```blade
@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-5 rounded-md shadow-md">
    <h1 class="text-center mb-6">Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <p>Your role: {{ auth()->user()->role }}</p>
</div>
@endsection
```

## Step 6: Testing the Application

### Run the Application

Run the application:

```bash
php artisan serve
```

Visit `http://localhost:8000/register` to create a new account. After registering, you should be able to log in and access the dashboard, which displays a welcome message based on the role you assigned.

### Validate User Input

Make sure to test the validation by trying to register without filling in all the fields. The application should redirect back to the registration form with error messages.

## Conclusion

In this tutorial, you learned how to implement role-based authentication in Laravel 11 using middleware and the Auth class. You created stunning views using Tailwind CSS, applied validation to user inputs, and set up a basic authentication flow.