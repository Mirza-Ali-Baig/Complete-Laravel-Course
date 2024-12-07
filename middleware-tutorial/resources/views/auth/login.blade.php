@extends('layouts.layout')

@section('content')
    <main class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Login to Your Account</h2>
            <form action="{{ route('login') }}" method="POST" name="login">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                           class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black
                           {{ $errors->has('email') ? 'border-red-500' : '' }}" value="{{ old('email') }}" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                           class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black
                           {{ $errors->has('password') ? 'border-red-500' : '' }}" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-black text-white hover:bg-gray-700 py-2 rounded-md">Login</button>
            </form>
            <p class="mt-4 text-center text-sm">
                Don't have an account? <a href="{{ route('register') }}" class="text-black hover:underline">Register</a>
            </p>
        </div>
    </main>
@endsection
