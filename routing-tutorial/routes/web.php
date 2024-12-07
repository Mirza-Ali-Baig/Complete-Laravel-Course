<?php

use Illuminate\Support\Facades\Route;

// Basic Routing
// Basic Route Definition
// Route Methods (GET, POST, PUT, DELETE)
// Route Parameters
// ----- Required Parameters
// ----- Optional Parameters
// ----- Route Constraints
// Call Views Using Route
// Named Routes
// Send Data in Views Using Route
// Groups of Routes
// Route Fallback
// Artisan Commands for Routes

// What is a route?
// A route is a URL that maps to a specific controller and method.

// Basic Route Definition
Route::get('/', function () {
    return "<h1>Welcome To Laravel Routing</h1>";
});

// Create a route that shows the about page
Route::get('/about', function () {
    return "<h1>About Laravel Routing</h1>";
});

// Route Methods (GET, POST, PUT, DELETE)

// GET Methods is used to retrieve data from the server
// POST Methods is used to send data to the server
// PUT Methods is used to update data on the server
// PATCH Methods is used to partially update data on the server
// DELETE Methods is used to delete data on the server
// Example:

Route::get('/users', function () {
 return "<h1>Get All Users</h1>";
});

Route::post('/users', function () {
 return "<h1>Create User</h1>";
});

Route::put('/users', function () {
 return "<h1>Update User</h1>";
});

Route::patch('/users', function () {
 return "<h1>Patch User</h1>";
});

Route::delete('/users', function () {
 return "<h1>Delete User</h1>";
});

// Route Parameters
// ----- Required Parameters
Route::get("/users/{id}", function ($id) {
    return "<h1>User ID: $id</h1>";
});

// ----- Optional Parameters

Route::get("/users/{id?}", function ($id = 1) {
    return "<h1>User ID: $id</h1>";
});
// ----- Multiple Route Parameters

Route::get("/users/{id}/{name}", function ($id, $name) {
    return "<h1>User ID: $id, Name: $name</h1>";
});


// ----- Route Constraints
Route::get("/users/{id}/", function ($id,) {
    return "<h1>User ID: $id</h1>";
})->whereNumber("id"); // it will accept only numbers

Route::get("/users/{id}/", function ($id,) {
    return "<h1>User ID: $id</h1>";
})->whereAlpha("id"); // it will accept only alphabets

Route::get("/users/{id}/", function ($id,) {
    return "<h1>User ID: $id</h1>";
})->whereAlphaNumeric("id"); // it will accept only alphabets and numbers

Route::get("/users/{id}/", function ($id,) {
    return "<h1>User ID: $id</h1>";
})->whereIn("id", [1, 2, 3]); // it will accept only 1, 2, 3

Route::get("/users/{name}/", function ($name,) {
    return "<h1>User ID: $name</h1>";
})->where("name", "[A-Za-z]+"); // it will accept only alphabets


// Call View Using Route

Route::get("/welcome", function () {
    return view("welcome");
});

// Named Routes

Route::get("/posts/news", function () {
    return "<h1>News Page</h1>";
})->name("news");

// Send Data in Views Using Route

Route::get("/posts/{id}", function ($id) {
    return view("post", ["id" => $id]);
});

// Route Groups

Route::group(["prefix" => "admin"], function () {
    Route::get("/posts", function () {
        return "<h1>Posts</h1>";
    })->name("posts");
});
// Route Fallback

Route::fallback(function () {
    return "<h1>Page Not Found</h1>";
});

// Default route that shows the welcome page
//Route::get('/', function () {
//    return "<h1>Welcome</h1>";
//});

// Create a route that shows the about page
//Route::get('/about', function () {
//    return view('about');
//});


// Artisan Commands for Routes
// php artisan route:list
// php artisan route:clear
// php artisan route:cache
// php artisan route:list --except-vendor
// php artisan route:list --only-vendor
// php artisan route:list --method=GET
// php artisan route:list --name=profile
// php artisan route:list --path=profile
