@extends('layouts.layout')

@section('content')
<!-- Blog Page Hero Section -->
<section class="bg-gray-100 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold text-black mb-4">Our Blog</h1>
        <p class="text-lg text-gray-700 mb-8">Stay updated with our latest posts and insights.</p>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post One" class="rounded-t-lg w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2">Blog Post One</h3>
                    <p class="text-gray-700 mb-4">A brief description of the first blog post that explains what it is about.</p>
                    <a href="#" class="text-black hover:text-gray-500">Read More</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post Two" class="rounded-t-lg w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2">Blog Post Two</h3>
                    <p class="text-gray-700 mb-4">A brief description of the second blog post that explains what it is about.</p>
                    <a href="#" class="text-black hover:text-gray-500">Read More</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post Three" class="rounded-t-lg w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2">Blog Post Three</h3>
                    <p class="text-gray-700 mb-4">A brief description of the third blog post that explains what it is about.</p>
                    <a href="#" class="text-black hover:text-gray-500">Read More</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post Four" class="rounded-t-lg w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2">Blog Post Four</h3>
                    <p class="text-gray-700 mb-4">A brief description of the fourth blog post that explains what it is about.</p>
                    <a href="#" class="text-black hover:text-gray-500">Read More</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post Five" class="rounded-t-lg w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2">Blog Post Five</h3>
                    <p class="text-gray-700 mb-4">A brief description of the fifth blog post that explains what it is about.</p>
                    <a href="#" class="text-black hover:text-gray-500">Read More</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post Six" class="rounded-t-lg w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2">Blog Post Six</h3>
                    <p class="text-gray-700 mb-4">A brief description of the sixth blog post that explains what it is about.</p>
                    <a href="#" class="text-black hover:text-gray-500">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
