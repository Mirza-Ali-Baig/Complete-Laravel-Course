<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-black shadow">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="text-white text-lg font-bold">Admin Panel</div>
            <div class="flex space-x-4">
                <a href="#" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md">Logout</a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="flex">
    <!-- Sidebar -->
    <aside class="bg-white w-64 shadow-md h-screen">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Navigation</h2>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">Users</a>
                </li>
                <li>
                    <a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">Posts</a>
                </li>
                <li>
                    <a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">Comments</a>
                </li>
                <li>
                    <a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">Settings</a>
                </li>
                <li>
                    <a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 rounded">Reports</a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Section -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <p class="text-gray-700">Welcome to the admin panel! Here you can manage your application.</p>

        <!-- Example Card Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <p class="text-3xl font-bold">150</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Posts</h2>
                <p class="text-3xl font-bold">75</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Comments</h2>
                <p class="text-3xl font-bold">320</p>
            </div>
        </div>
    </main>
</div>

<!-- Footer -->
<footer class="bg-black text-white py-4 mt-6">
    <div class="max-w-7xl mx-auto text-center">
        <p class="text-sm">© 2024 Your Company. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
