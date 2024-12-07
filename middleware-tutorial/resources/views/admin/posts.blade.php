<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Posts</title>
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
        <h1 class="text-3xl font-bold mb-4">Manage Posts</h1>
        <p class="text-gray-700 mb-6">Here you can view, edit, or delete your blog posts.</p>

        <div class="mb-4">
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md">Add New Post</a>
        </div>

        <!-- Posts Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">First Blog Post</td>
                    <td class="px-6 py-4 whitespace-nowrap">Admin</td>
                    <td class="px-6 py-4 whitespace-nowrap">2024-01-01</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="#" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Second Blog Post</td>
                    <td class="px-6 py-4 whitespace-nowrap">Admin</td>
                    <td class="px-6 py-4 whitespace-nowrap">2024-01-02</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="#" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Third Blog Post</td>
                    <td class="px-6 py-4 whitespace-nowrap">Admin</td>
                    <td class="px-6 py-4 whitespace-nowrap">2024-01-03</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="#" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
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
