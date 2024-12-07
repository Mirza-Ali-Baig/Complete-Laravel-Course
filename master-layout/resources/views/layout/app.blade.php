{{-- resources/views/layouts/layout.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles') {{-- This will include any styles pushed to the stack --}}
</head>
<body>
<header>
    <div class="container">
        <h1>My Application</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <div class="sidebar">
        @include('partials.sidebar') {{-- Include a separate file for sidebar --}}
    </div>

    <main>
        @yield('content') {{-- This is where the content from child views will be injected --}}
    </main>
</div>

<footer>
    <div class="container">
        <p>&copy; 2024 My Application</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts') {{-- This will include any scripts pushed to the stack --}}
</body>
</html>
