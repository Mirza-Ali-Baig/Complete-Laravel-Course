@extends('layouts.layout')

@section('content')

<!-- Contact Page Hero Section -->
<section class="bg-gray-100 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold text-black mb-4">Contact Us</h1>
        <p class="text-lg text-gray-700 mb-8">We'd love to hear from you! Fill out the form below or reach us through the information provided.</p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-4xl font-bold text-black text-center mb-6">Get in Touch</h2>
            <form>
                <div class="mb-4">
                    <input type="text" placeholder="Your Name" class="w-full p-3 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Your Email" class="w-full p-3 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <textarea placeholder="Your Message" class="w-full p-3 border border-gray-300 rounded-md" rows="4" required></textarea>
                </div>
                <button type="submit" class="bg-black text-white hover:bg-gray-700 px-6 py-3 rounded-md">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- Company Information Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-black mb-6">Our Contact Information</h2>
        <p class="text-lg text-gray-700 mb-2">Email: <a href="mailto:info@brand.com" class="text-blue-500">info@brand.com</a></p>
        <p class="text-lg text-gray-700 mb-2">Phone: <a href="tel:+1234567890" class="text-blue-500">+1 (234) 567-890</a></p>
        <p class="text-lg text-gray-700 mb-2">Address: 123 Main St, City, Country</p>
    </div>
</section>

<!-- Map Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-black mb-6">Find Us Here</h2>
        <!-- Replace with your actual map embed code -->
        <div class="mb-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509984!2d144.9537353153157!3d-37.81627997975134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0f0f0f%3A0x5045675218ce6f0!2sYour%20Business%20Name!5e0!3m2!1sen!2sus!4v1611234567890!5m2!1sen!2sus"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

@endsection
