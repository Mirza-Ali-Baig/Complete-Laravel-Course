<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">CRUD App</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Item</a>
    </div>
    @if($users->count() > 0)
    <p class="mb-4">Total: {{ $users->count() }}</p>
    @else
    <p class="mb-4">No items found</p>
    @endif
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-200 text-gray-600">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Show</th>
            <th class="py-2 px-4 border-b">Edit</th>
            <th class="py-2 px-4 border-b">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr class="hover:bg-gray-100">
            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
            <td class="py-2 px-4 border-b">
                <a  href="{{ route('users.show', $user->id) }}" class="bg-green-500 block text-center w-full text-white px-2 py-1 rounded hover:bg-green-600">Show</a>
            </td>
            <td class="py-2 px-4 border-b">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 block text-center w-full text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
            </td>
            <td class="py-2 px-4 border-b">
                <a href="{{ route('users.destroy', $user->id) }}" class="bg-red-500 block text-center w-full text-white px-2 py-1 rounded hover:bg-red-600">Delete</a>
            </td>
        </tr>
        @endforeach
        <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

</body>
</html>
