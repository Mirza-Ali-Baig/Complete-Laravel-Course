# Eloquent ORM in Laravel

Eloquent is Laravel ORM system, offering an expressive way to interact with databases.

## Table of Contents

1. [Defining Models](#defining-models)
2. [Basic CRUD Operations](#basic-crud-operations)
3. [Relationships](#relationships)
4. [Querying](#querying)
5. [Eager Loading](#eager-loading)
6. [Scopes](#scopes)
7. [Mutators and Accessors](#mutators-and-accessors)

## Defining Models

Create a model using Artisan:

```bash
php artisan make:model User
```

Basic model structure:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];
}
```

## Basic CRUD Operations

### Create

```php
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);
```

### Read

```php
$user = User::find(1);
$users = User::all();
```

### Update

```php
$user = User::find(1);
$user->name = 'Jane Doe';
$user->save();

// Or
User::where('id', 1)->update(['name' => 'Jane Doe']);
```

### Delete

```php
$user = User::find(1);
$user->delete();

// Or
User::destroy(1);
```

## Relationships

### One to One

```php
class User extends Model
{
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}
```

### One to Many

```php
class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```

### Many to Many

```php
class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
```

## Querying

```php
$users = User::where('active', 1)
             ->orderBy('name', 'desc')
             ->take(10)
             ->get();
```

## Eager Loading

```php
$posts = Post::with('comments')->get();
```

## Scopes

```php
class User extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}

// Usage
$activeUsers = User::active()->get();
```

## Mutators and Accessors

### Mutator

```php
class User extends Model
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
```

### Accessor

```php
class User extends Model
{
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

// Usage
$fullName = $user->full_name;
```

This document provides a comprehensive overview of Eloquent ORM in Laravel, ready for Markdown rendering in any platform.
