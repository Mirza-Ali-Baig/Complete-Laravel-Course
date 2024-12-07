<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Components </title>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
</head>
<body>
    <h1 class="text-4xl text-center my-6">Components in Laravel</h1>
    <x-button text="Click me" :active="true"/>
    <x-button text="Login"/>
    <x-button text="Register"/>

    <x-card title="Title" description="Description"/>
    <x-form.input>
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </x-slot:icon>
        <x-slot name="placeholder">Enter your email</x-slot>
    </x-form.input>
</body>
</html>
