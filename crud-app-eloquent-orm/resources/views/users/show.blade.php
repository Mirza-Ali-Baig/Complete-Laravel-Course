<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Screen UI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">User Details</h2>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name:
        </label>
        <p class="text-gray-700">{{ $user->name }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email:
        </label>
        <p class="text-gray-700">{{ $user->email }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password:
        </label>
        <input class="text-gray-700 w-full border rounded py-2 px-3 focus:outline-none focus:shadow-outline" type="password" readonly value="{{ $user->password }}"/>
    </div>
    <div class="flex justify-between mt-6">
        <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
            Edit
        </a>
        <a href="{{ route('users.destroy', $user->id) }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:shadow-outline">
            Delete
        </a>
    </div>
</div>

</body>
</html>
