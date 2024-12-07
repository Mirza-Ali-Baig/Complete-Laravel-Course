<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

<!-- Form Container -->
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Student Form</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500 mb-2 text-sm font-semibold">{{ $error }}</li>
        @endforeach
    </ul>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" value="{{ old('name') }}" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-md @error('name') border-red-500 @enderror" >
            <span class="text-red-500 text-sm font-semibold">
                @error("name")
                {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" value="{{old('email')}}" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md @error('email') border-red-500 @enderror" >
            <span class="text-red-500 text-sm font-semibold">
                @error("email")
                {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md @error('password') border-red-500 @enderror" >
            <span class="text-red-500 text-sm font-semibold">
                @error("password")
                {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
            <input type="tel" value="{{old('phone')}}" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded-md @error('phone') border-red-500 @enderror" >
            <span class="text-red-500 text-sm font-semibold">
            @error("phone")
            {{ $message }}
            @enderror
        </div>

        <!-- Age -->
        <div class="mb-4">
            <label for="age" class="block text-gray-700 font-semibold mb-2">Age</label>
            <input type="number" value="{{old('age')}}" id="age" name="age" min="1" class="w-full p-2 border border-gray-300 rounded-md @error('age') border-red-500 @enderror" >
            <span class="text-red-500 text-sm font-semibold">
                @error("age")
                {{ $message }}
                @enderror
            </span >
        </div>

        <!-- Gender -->
        <div class="mb-6">
            <label for="gender" class="block text-gray-700 font-semibold mb-2">Gender</label>
            <select id="gender" name="gender" class="w-full p-2 border border-gray-300 rounded-md @error('gender') border-red-500 @enderror" >
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <span class="text-red-500 text-sm font-semibold">
                @error("gender")
                {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Submit</button>
    </form>
</div>

</body>
</html>
