# Laravel Has One Through Many Relationship Guide

This guide will help you implement a `Country` and `PostalCode` relationship in Laravel, allowing you to fetch a country's postal code.

## Step 1: Set Up Your Models

### Create the User Model

If you haven't already created the `User` model, run the following command:

```bash
php artisan make:model User -m
```

### Create the Order Model

Create the `Order` model with:

```bash
php artisan make:model Order -m
```

## Step 2: Define the Database Migrations

### User Migration

Edit the migration file for users (`database/migrations/xxxx_xx_xx_create_users_table.php`):

```php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

### Order Migration

Edit the migration file for orders (`database/migrations/xxxx_xx_xx_create_orders_table.php`):

```php
public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->decimal('total_amount', 10, 2);
        $table->timestamps();
    });
}
```

## Step 3: Define the Relationships

### User Model

Open the `User` model (`app/Models/User.php`) and define the relationships:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function latestOrders($limit = 5)
    {
        return $this->orders()->latest()->take($limit)->get();
    }

    public function oldestOrders($limit = 5)
    {
        return $this->orders()->oldest()->take($limit)->get();
    }

    public function largestOrders($limit = 5)
    {
        return $this->orders()->orderBy('total_amount', 'desc')->take($limit)->get();
    }

    public function smallestOrders($limit = 5)
    {
        return $this->orders()->orderBy('total_amount', 'asc')->take($limit)->get();
    }

    public function totalSpent()
    {
        return $this->orders()->sum('total_amount');
    }

    public function averageOrderAmount()
    {
        return $this->orders()->avg('total_amount');
    }
}
```

### Order Model

Open the `Order` model (`app/Models/Order.php`) and define the inverse relationship:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

## Step 4: Seed the Database (Optional)

To test the relationships, create some sample users and orders.

### Database Seeder

Edit the seeder file (`database/seeders/DatabaseSeeder.php`):

```php
use App\Models\User;
use App\Models\Order;

public function run()
{
    User::factory(5)->create()->each(function ($user) {
        for ($i = 0; $i < 3; $i++) {
            Order::create([
                'user_id' => $user->id,
                'total_amount' => rand(50, 200) * 10, // Random amounts between 500 and 2000
            ]);
        }
    });
}
```

### Run the Seeder

Run the following command:

```bash
php artisan migrate --seed
```

## Step 5: Using the Methods in a Controller

Implement the methods in a controller:

### UserController

Create or edit the `UserController` (`app/Http/Controllers/UserController.php`):

```php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with('orders')->findOrFail($id);

        $latestOrders = $user->latestOrders();
        $oldestOrders = $user->oldestOrders();
        $largestOrders = $user->largestOrders();
        $smallestOrders = $user->smallestOrders();
        $totalSpent = $user->totalSpent();
        $averageOrderAmount = $user->averageOrderAmount();

        return view('user.show', compact('user', 'latestOrders', 'oldestOrders', 'largestOrders', 'smallestOrders', 'totalSpent', 'averageOrderAmount'));
    }
}
```

## Step 6: Displaying in a Blade View

Display the retrieved data in your Blade view (`resources/views/user/show.blade.php`):

```blade
<h1>{{ $user->name }}</h1>

<h2>Latest Orders</h2>
<ul>
    @foreach ($latestOrders as $order)
        <li>Order ID: {{ $order->id }} - Amount: ${{ $order->total_amount }} - Date: {{ $order->created_at }}</li>
    @endforeach
</ul>

<h2>Oldest Orders</h2>
<ul>
    @foreach ($oldestOrders as $order)
        <li>Order ID: {{ $order->id }} - Amount: ${{ $order->total_amount }} - Date: {{ $order->created_at }}</li>
    @endforeach
</ul>

<h2>Largest Orders</h2>
<ul>
    @foreach ($largestOrders as $order)
        <li>Order ID: {{ $order->id }} - Amount: ${{ $order->total_amount }} - Date: {{ $order->created_at }}</li>
    @endforeach
</ul>

<h2>Smallest Orders</h2>
<ul>
    @foreach ($smallestOrders as $order)
        <li>Order ID: {{ $order->id }} - Amount: ${{ $order->total_amount }} - Date: {{ $order->created_at }}</li>
    @endforeach
</ul>

<h2>Total Spent: ${{ $totalSpent }}</h2>
<h2>Average Order Amount: ${{ number_format($averageOrderAmount, 2) }}</h2>
```

## Conclusion

You now have a complete setup for managing user orders using a **hasMany** relationship in Laravel. Each method in the `User` model retrieves specific types of orders, allowing you to easily access the latest, oldest, largest, smallest orders, total spent, and average order amount. Feel free to enhance or modify these methods based on your application's requirements.
```

This Markdown document provides a comprehensive guide on setting up and querying user and order relationships in Laravel. You can use it as a reference for building your application.
