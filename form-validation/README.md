# Laravel Form Validation Tutorial

This tutorial covers form validation in Laravel, including using request classes, displaying error messages, and customizing validation messages.

## Table of Contents

1. [Basic Validation](#basic-validation)
2. [Custom Request Classes](#custom-request-classes)
3. [Displaying Error Messages](#displaying-error-messages)
4. [Customizing Validation Messages](#customizing-validation-messages)

## Basic Validation

Laravel provides several ways to validate incoming request data. Here's a basic example:

```php
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ]);

    // Process the validated data...
}
```
## Custom Request Classes
For more complex validation scenarios, you can create custom request classes:

#### 1. Generate a new request class:

```
php artisan make:request StudentRequest
```
#### 2. Define rules in the rules() method:

```
class StudentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer|min:5|max:25',
        ];
    }
}
```
#### 3. Use the custom request in your controller:
```
public function store(StudentRequest $request)
{
    // The request is validated, process the data...
}
```
## Displaying Error Messages
### In a list
```
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```
### Below each field
```
<input type="text" name="name" value="{{ old('name') }}">

@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```
## Customizing Validation Messages
### Basic Validation
When using basic validation in your controller, you can customize messages by passing an array as the second argument to the validate method:
```php

public function store(Request $request)
{
    $customMessages = [
        'name.required' => 'We need to know your name!',
        'email.unique' => 'This email is already registered.',
        'password.min' => 'Your password must be at least 8 characters long.',
    ];

    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ], $customMessages);

    // Process the validated data...
}
```
### Custom Request Classes
For custom request classes, you can override the messages() method to define custom error messages:
```
class StudentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer|min:5|max:25',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.unique' => 'This email is already in use',
            'age.min' => 'You must be at least 5 years old',
            'age.max' => 'You cannot be older than 25 years',
        ];
    }
}
```
## Displaying Custom Messages
<br>
The custom messages will automatically be used when displaying errors, whether you're using lists or individual field errors.

## Customizing Attribute Names
You can also customize the attribute names used in error messages by overriding the attributes() method in your custom request class:
```php

public function attributes()
{
    return [
        'email' => 'email address',
    ];
}

```
This will change messages like "The email field is required" to "The email address field is required."
