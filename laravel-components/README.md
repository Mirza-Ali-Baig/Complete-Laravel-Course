# Tutorial: Using Components in Laravel

Laravel components provide a powerful way to build reusable, self-contained UI elements in your application. Components can encapsulate HTML and logic, making your views cleaner and more maintainable. This tutorial will cover:

1. What are components?
2. Creating a basic component.
3. Passing data to components.
4. Using slots in components.
5. Creating a component with a view and logic.
6. Creating a blade component class.
7. Using inline components.
8. Testing components.

## Step 1: What Are Components?

Components in Laravel allow you to create reusable pieces of UI that can include HTML, CSS, and JavaScript. They help to keep your code DRY (Don't Repeat Yourself) and promote better organization.

## Step 2: Creating a Basic Component

### Generate a Component

You can create a component using Artisan:

```bash
php artisan make:component Alert
```

This command creates two files:

- A view file: `resources/views/components/alert.blade.php`
- A class file: `app/View/Components/Alert.php`

### Define the Component View

Open the view file `resources/views/components/alert.blade.php` and add the following HTML:

```blade
<div class="alert alert-warning" role="alert">
    {{ $slot }}
</div>
```

### Define the Component Class

Open the class file `app/View/Components/Alert.php` and modify it if needed (it's optional for simple components):

```php
namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public function render()
    {
        return view('components.alert');
    }
}
```

## Step 3: Passing Data to Components

You can pass data to components using attributes. Update the `Alert` component to accept a title.

### Modify the Component Class

In `app/View/Components/Alert.php`, add the `$title` property:

```php
namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.alert');
    }
}
```

### Update the Component View

Modify `resources/views/components/alert.blade.php` to display the title:

```blade
<div class="alert alert-warning" role="alert">
    <strong>{{ $title }}</strong> {{ $slot }}
</div>
```

### Using the Component in a View

You can use the component in any Blade view, such as `resources/views/welcome.blade.php`:

```blade
<x-alert title="Notice!">
    This is a simple alert message.
</x-alert>
```

## Step 4: Using Slots in Components

Slots allow you to define sections within your component that can be filled with custom content.

### Example of Using Slots

In the `alert.blade.php` file, you already have the `$slot` variable for the main content. You can create named slots as well.

#### Modify the Component View for Named Slots

Update `resources/views/components/alert.blade.php`:

```blade
<div class="alert alert-warning" role="alert">
    <strong>{{ $title }}</strong> 
    {{ $slot }}

    @if (isset($footer))
        <div class="mt-2">
            {{ $footer }}
        </div>
    @endif
</div>
```

### Using Named Slots in a View

You can use named slots in your component like this:

```blade
<x-alert title="Notice!">
    This is a simple alert message.
    <x-slot name="footer">
        This is the footer content.
    </x-slot>
</x-alert>
```

## Step 5: Creating a Component with a View and Logic

You can create more complex components that have their own logic. For instance, a `Counter` component that displays and increments a number.

### Generate the Counter Component

```bash
php artisan make:component Counter
```

### Define the Component Class

In `app/View/Components/Counter.php`:

```php
namespace App\View\Components;

use Illuminate\View\Component;

class Counter extends Component
{
    public $count;

    public function __construct($count = 0)
    {
        $this->count = $count;
    }

    public function increment()
    {
        return ++$this->count;
    }

    public function render()
    {
        return view('components.counter');
    }
}
```

### Define the Component View

Create the view `resources/views/components/counter.blade.php`:

```blade
<div>
    <h2>Count: {{ $count }}</h2>
    <button wire:click="increment">Increment</button>
</div>
```

### Using the Counter Component in a View

```blade
<x-counter count="0" />
```

## Step 6: Creating a Blade Component Class

You can also create a class-based component that is more complex. You can define properties and methods in the component class.

### Example of Class-Based Component

In `app/View/Components/ExampleComponent.php`:

```php
namespace App\View\Components;

use Illuminate\View\Component;

class ExampleComponent extends Component
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('components.example-component');
    }
}
```

### Component View

Create the view `resources/views/components/example-component.blade.php`:

```blade
<div>
    <p>{{ $data }}</p>
</div>
```

### Using the Class-Based Component

```blade
<x-example-component data="Hello, World!" />
```

## Step 7: Using Inline Components

You can also create inline components that do not require a separate view file.

### Example of Inline Component

You can define an inline component directly in your Blade file:

```blade
@component('components.alert', ['title' => 'Inline Alert'])
    This is an inline alert message.
@endcomponent
```

## Step 8: Testing Components

Laravel provides a way to test your components using the built-in testing methods. You can create tests to ensure your components render the expected output.

### Example of Component Test

Generate a test for your `Alert` component:

```bash
php artisan make:test AlertComponentTest
```

### Define the Test

In `tests/Feature/AlertComponentTest.php`:

```php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlertComponentTest extends TestCase
{
    /** @test */
    public function it_renders_the_alert_component()
    {
        $this->blade('<x-alert title="Test Title">Test message</x-alert>')
            ->assertSee('Test Title')
            ->assertSee('Test message')
            ->assertSee('alert alert-warning');
    }
}
```

Run your tests using:

```bash
php artisan test
```

## Conclusion

In this tutorial, you learned how to create and use components in Laravel. Components help you build reusable UI elements that keep your code organized and maintainable. You can also pass data, use slots, create complex components with logic, and test your components to ensure they behave as expected.
