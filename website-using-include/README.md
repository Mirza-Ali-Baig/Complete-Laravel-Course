# Creating a Website Using `@include` in Laravel

## Introduction

This documentation provides a step-by-step guide on how to create a modular and maintainable website using the `@include` directive in Laravel's Blade templating engine. The `@include` directive allows you to include Blade views within other views, making it easier to manage and reuse components.

## Prerequisites

- Laravel installed on your local development environment.
- Basic understanding of Blade templating.

## Step 1: Setting Up the Project

First, create a new Laravel project if you haven't already:

```bash
composer create-project --prefer-dist laravel/laravel mywebsite
```

Navigate to your project directory:

```bash
cd mywebsite
```

## Step 2: Creating Blade Templates

### Main Template

Create a main template that will serve as the base for your other views. This template will include common elements like the header and footer.

```blade
<!-- resources/views/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.header')

    <div class="container">
        @include('content')
    </div>

    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
```

### Header and Footer Partials

Create partial views for the header and footer.

```blade
<!-- resources/views/partials/header.blade.php -->
<header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </nav>
</header>
```

```blade
<!-- resources/views/partials/footer.blade.php -->
<footer>
    <p>&copy; 2024 My Website. All rights reserved.</p>
</footer>
```

### Content Pages

Create content pages that will be included in the main template.

```blade
<!-- resources/views/content/home.blade.php -->
<h1>Welcome to My Website</h1>
<p>This is the home page.</p>
```

```blade
<!-- resources/views/content/about.blade.php -->
<h1>About Us</h1>
<p>This is the about page.</p>
```

```blade
<!-- resources/views/content/contact.blade.php -->
<h1>Contact Us</h1>
<p>This is the contact page.</p>
```

## Step 3: Defining Routes

Define routes for your content pages in the `web.php` file.

```php
// routes/web.php
Route::get('/', function () {
    return view('main', ['content' => 'content.home']);
});

Route::get('/about', function () {
    return view('main', ['content' => 'content.about']);
});

Route::get('/contact', function () {
    return view('main', ['content' => 'content.contact']);
});
```

## Step 4: Running the Application

Run the Laravel development server to see your website in action.

```bash
php artisan serve
```

Open your browser and navigate to `http://localhost:8000` to view your website.

## Conclusion

Using the `@include` directive in Laravel's Blade templating engine allows you to create modular and maintainable websites. By breaking down your views into smaller, reusable components, you can manage your code more efficiently and make updates with ease.
