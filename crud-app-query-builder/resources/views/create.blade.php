<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

<!-- Form Container -->
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Add New Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Position -->
        <div class="mb-4">
            <label for="position" class="block text-gray-700 font-semibold mb-2">Position</label>
            <input type="text" id="position" name="position" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
            <input type="tel" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Age -->
        <div class="mb-4">
            <label for="age" class="block text-gray-700 font-semibold mb-2">Age</label>
            <input type="number" id="age" name="age" min="1" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Salary -->
        <div class="mb-6">
            <label for="salary" class="block text-gray-700 font-semibold mb-2">Salary</label>
            <input type="number" id="salary" name="salary" step="0.01" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Add Employee</button>
    </form>
</div>
</body>
</html>
