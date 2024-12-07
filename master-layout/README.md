# Laravel Master Layout

## Introduction

In Laravel, Blade is a powerful templating engine that provides a simple and intuitive way to create layouts and manage sections within your views. This documentation covers the use of Blade directives such as `@section`, `@yield`, `@extends`, `@hasSection`, and `@push` to create and manage master layouts effectively.

## Blade Directives

### 1. `@extends`

The `@extends` directive is used to specify which layout a view should inherit. It allows you to define a master layout that other views can extend.

**Example:**

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>My Application</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 My Application</p>
    </footer>
</body>
</html>
```

In the example above, `@extends` would be used in a child view to extend this layout.

### 2. `@section`

The `@section` directive is used to define a section of content that will be injected into a specific part of the master layout.

**Example:**

```blade
{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h2>Welcome to the Home Page</h2>
    <p>This is the main content area.</p>
@endsection
```

In this example, `@section('title', 'Home Page')` sets the title of the page, and `@section('content')` defines the content that will be inserted into the `@yield('content')` section of the master layout.

### 3. `@yield`

The `@yield` directive is used to specify where content from `@section` directives should be inserted in the master layout. It acts as a placeholder for dynamic content.

**Example:**

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>My Application</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 My Application</p>
    </footer>
</body>
</html>
```

In this example, `@yield('title')` and `@yield('content')` are placeholders where the content from child views will be inserted.

### 4. `@hasSection`

The `@hasSection` directive checks if a section has been defined. This is useful for conditionally rendering content based on whether a section is provided.

**Example:**

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>Default Title</title>
    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>My Application</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 My Application</p>
    </footer>
</body>
</html>
```

### 5. `@push` and `@stack`

The `@push` directive is used to push content onto a stack. The `@stack` directive is used to render the contents of the stack.

**Example:**

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles') {{-- This will include any styles pushed to the stack --}}
</head>
<body>
    <header>
        <h1>My Application</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 My Application</p>
    </footer>
    @stack('scripts') {{-- This will include any scripts pushed to the stack --}}
</body>
</html>
```

**Child View:**

```blade
{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <h2>Welcome to the Home Page</h2>
    <p>This is the main content area.</p>
@endpush
```

In this example, any styles or scripts pushed to the `styles` or `scripts` stack will be rendered in the master layout.

## Conclusion

Blade directives provide a powerful way to create reusable layouts and manage content in Laravel views. By using `@extends`, `@section`, `@yield`, `@hasSection`, and `@push`, you can build flexible and maintainable templates for your Laravel applications.

For more information, [Laravel Blade documentation](https://laravel.com/docs/blade).
