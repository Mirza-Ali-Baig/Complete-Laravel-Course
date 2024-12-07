@extends('layouts.layout')

@section('content')
<!-- About Page Hero Section -->
<section class="bg-gray-100 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold text-black mb-4">About Us</h1>
        <p class="text-lg text-gray-700 mb-8">Learn more about our mission, vision, and the team behind our platform.</p>
    </div>
</section>

<!-- Our Mission Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-black mb-4">Our Mission</h2>
        <p class="text-lg text-gray-700 mb-8">To provide the best services and experiences for our users, fostering innovation and collaboration.</p>
    </div>
</section>

<!-- Our Team Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-black mb-8">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="https://via.placeholder.com/150" alt="Team Member One" class="rounded-full w-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-black">John Doe</h3>
                <p class="text-gray-700">CEO & Founder</p>
                <p class="text-gray-500">John is passionate about technology and innovation, leading our team with a vision for the future.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="https://via.placeholder.com/150" alt="Team Member Two" class="rounded-full w-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-black">Jane Smith</h3>
                <p class="text-gray-700">CTO</p>
                <p class="text-gray-500">Jane oversees our technology strategy, ensuring we stay ahead in the competitive landscape.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="https://via.placeholder.com/150" alt="Team Member Three" class="rounded-full w-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-black">Emily Johnson</h3>
                <p class="text-gray-700">Marketing Director</p>
                <p class="text-gray-500">Emily is dedicated to spreading our message and connecting with our audience effectively.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-black mb-4">Get in Touch</h2>
        <p class="text-lg text-gray-700 mb-8">We would love to hear from you! If you have any questions, feel free to reach out.</p>
        <a href="#" class="bg-black text-white hover:bg-gray-700 px-6 py-3 rounded-md text-lg">Contact Us</a>
    </div>
</section>

@endsection
