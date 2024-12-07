# Laravel Seeder Tutorial

## Introduction

Seeders in Laravel are used to populate your database with sample or default data. They are particularly useful during development and testing to ensure your application has the data it needs to function correctly. This tutorial will guide you through creating and using models, seeders, and factories in Laravel.

## Table of Contents

1. [Creating Models](#creating-models)
2. [Creating Seeders](#creating-seeders)
3. [Defining Seeder Logic](#defining-seeder-logic)
4. [Running Seeders](#running-seeders)
5. [Using Factories](#using-factories)
6. [Best Practices](#best-practices)
7. [Examples](#examples)

## Creating Models

Models in Laravel are Eloquent classes that interact with your database. They are used to query and manipulate data in your application.

### Creating a Model

To create a new Eloquent model, use the `make:model` Artisan command. Here’s the general syntax:

```bash
php artisan make:model ModelName
```

### Example

To create a model for the `User` table:

```bash
php artisan make:model User
```

This command generates a new file in the `app/Models` directory named `User.php`.

### Defining a Model

A basic model might look like this:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'users';

    // Specify the primary key
    protected $primaryKey = 'id';

    // Specify whether the primary key is auto-incrementing
    public $incrementing = true;

    // Specify whether the model should use timestamps
    public $timestamps = true;
}
```

In this example:
- **`use HasFactory`**: Allows the model to use Laravel factory feature.
- **`protected $table`**: Specifies the table associated with the model.
- **`protected $primaryKey`**: Specifies the primary key column.
- **`public $incrementing`**: Indicates if the primary key is auto-incrementing.
- **`public $timestamps`**: Indicates if the model should manage created_at and updated_at timestamps.

## Creating Seeders

To create a new seeder, use the `make:seeder` Artisan command. Here’s the general syntax:

```bash
php artisan make:seeder SeederName
```

### Example

To create a seeder for the `users` table:

```bash
php artisan make:seeder UsersTableSeeder
```

This command generates a new file in the `database/seeders` directory named `UsersTableSeeder.php`.

## Defining Seeder Logic

Once you have created a seeder, you need to define the logic for populating the database within the `run` method of the seeder class.

1. **Open the seeder file** located in `database/seeders/UsersTableSeeder.php`.

2. **Define the data to seed** in the `run` method. You can use Eloquent models or the query builder to insert data into the database.

### Example

Here’s an example of a simple seeder for the `users` table:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
```

In this example:
- **`DB::table('users')->insert([...])`**: Inserts multiple user records into the `users` table.
- **`Hash::make('password123')`**: Hashes the password before storing it in the database.

## Running Seeders

To run all seeders, use the `db:seed` Artisan command:

```bash
php artisan db:seed
```

This command will execute the `DatabaseSeeder` class, which is responsible for calling other seeders.

### Running Specific Seeders

To run a specific seeder, use the `--class` option:

```bash
php artisan db:seed --class=UsersTableSeeder
```

## Using Factories

Laravel factories allow you to generate large amounts of data quickly for testing purposes. Factories are defined in the `database/factories` directory and are used within seeders to create fake data.

### Creating a Factory

To create a new factory, use the `make:factory` Artisan command:

```bash
php artisan make:factory ModelFactory
```

### Example Factory

Here’s an example of a factory for the `User` model:

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password123'),
        ];
    }
}
```

### Using Factory in Seeder

You can use the factory in your seeder to generate multiple records:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create();
    }
}
```

In this example, `User::factory(10)->create()` generates 10 user records using the `UserFactory`.

## Best Practices

- **Keep Seeders Simple:** Focus on a single purpose for each seeder to keep them manageable.
- **Use Factories for Large Data Sets:** Leverage factories to generate large amounts of test data efficiently.
- **Run Seeders in Development Only:** Avoid running seeders that insert default data in production environments unless necessary.
- **Test Seeders:** Always test your seeders to ensure they work as expected and do not introduce errors into your database.

## Examples

### Example 1: Seeder with Static Data

To seed static data into the `posts` table:

1. **Create Seeder:**

    ```bash
    php artisan make:seeder PostsTableSeeder
    ```

2. **Define Seeder Logic:**

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class PostsTableSeeder extends Seeder
    {
        public function run()
        {
            DB::table('posts')->insert([
                ['title' => 'First Post', 'body' => 'This is the body of the first post.'],
                ['title' => 'Second Post', 'body' => 'This is the body of the second post.'],
            ]);
        }
    }
    ```

3. **Run Seeder:**

    ```bash
    php artisan db:seed --class=PostsTableSeeder
    ```

### Example 2: Seeder with Factory Data

To seed user data using a factory:

1. **Create Factory:**

    ```bash
    php artisan make:factory UserFactory
    ```

2. **Define Factory Logic:**

    ```php
    <?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Facades\Hash;

    class UserFactory extends Factory
    {
        protected $model = \App\Models\User::class;

        public function definition()
        {
            return [
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ];
        }
    }
    ```

3. **Create Seeder:**

    ```bash
    php artisan make:seeder UsersTableSeeder
    ```

4. **Define Seeder Logic:**

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;

    class UsersTableSeeder extends Seeder
    {
        public function run()
        {
            \App\Models\User::factory(10)->create();
        }
    }
    ```

5. **Run Seeder:**
