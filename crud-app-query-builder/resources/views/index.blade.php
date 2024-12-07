<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
<body class="p-6 bg-gray-100">

<!-- Header -->
<header class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Employee Management</h1>
    <a href="{{route('employees.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ Add New Employee</a>
</header>

<!-- Employee Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <!-- Employee Card Example -->
    @foreach($employees as $employee)

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="mb-4">
                <h3 class="text-3xl font-semibold text-gray-800">{{$employee->name}}</h3>
                <p class="text-gray-600 text-sm">{{$employee->position}}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-600">Email:
                    <a href="email:{{$employee->email}}"
                       class="text-blue-500 hover:underline">{{$employee->email}}</a></p>
                <p class="text-gray-600">Phone: <a href="tel:+{{$employee->phone}}" class="text-blue-500 hover:underline">{{$employee->phone}}</a></p>
                <p class="text-gray-600">Age: {{$employee->age}}</p>
                <p class="text-gray-600">Salary: {{$employee->salary}}</p>
            </div>
            <div class="flex justify-center gap-4 mt-6">
                <a href="{{route('employees.edit', $employee->id)}}"
                   class="bg-yellow-500 flex-1 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition text-center">Edit</a>
                <a href="{{route('employees.delete', $employee->id)}}"
                   class="bg-red-500 flex-1 text-white px-4 py-2 rounded-md hover:bg-red-600 transition text-center">Delete</a>
            </div>
        </div>
    @endforeach
</div>
<div>
    {{$employees->links()}}
</div>

</body>
</html>
