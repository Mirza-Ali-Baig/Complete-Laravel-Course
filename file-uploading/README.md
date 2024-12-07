# Tutorial: File Uploading in Laravel

In this tutorial, we'll learn how to implement file uploading in a Laravel application. We will cover the following steps:

1. Setting up a new Laravel application.
2. Creating a form for file uploads.
3. Handling file uploads in the controller.
4. Storing and displaying uploaded files.

## Prerequisites

- PHP (7.3 or higher)
- Composer
- Laravel (latest version)
- Basic knowledge of Laravel routing, controllers, and views

## Step 1: Set Up a New Laravel Application

If you don’t have a Laravel application set up, create a new one using:

```bash
composer create-project --prefer-dist laravel/laravel file-upload-example
```

## Step 2: Create a File Upload Form

### Create a Controller

First, create a controller to handle the file upload:

```bash
php artisan make:controller FileUploadController
```

### Define Routes

Open the `routes/web.php` file and add the following routes:

```php
use App\Http\Controllers\FileUploadController;

Route::get('/upload', [FileUploadController::class, 'create'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload.store');
```

### Create the View

Next, create a Blade view for the file upload form. Create a new file `resources/views/upload.blade.php`:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>File Upload</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose File</label>
                <input type="file" class="form-control" name="file" id="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
```

## Step 3: Handle File Uploads in the Controller

Open `app/Http/Controllers/FileUploadController.php` and implement the `create` and `store` methods:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate file type and size
        ]);

        // Store the file
        $path = $request->file('file')->store('uploads', 'public');

        // Optionally, store the file path in the database or perform other actions

        return back()->with('success', 'File uploaded successfully.')->with('path', $path);
    }
}
```

## Step 4: Displaying Uploaded Files

To display the uploaded file paths, modify the Blade view (`resources/views/upload.blade.php`) to show success messages and file paths:

```blade
<body>
    <div class="container mt-5">
        <h1>File Upload</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }} <br>
                <a href="{{ asset('storage/' . session('path')) }}">Download File</a>
            </div>
        @endif
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose File</label>
                <input type="file" class="form-control" name="file" id="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
```

## Step 5: Configure Filesystem

Laravel uses the `public` disk by default for file storage. Make sure you have the necessary symbolic link set up to access the stored files easily. Run the following command:

```bash
php artisan storage:link
```

This command creates a symbolic link from `public/storage` to `storage/app/public`.

## Step 6: Test the Application

You can now run your Laravel application:

```bash
php artisan serve
```

Visit `http://localhost:8000/upload` in your web browser. You should see the file upload form.

1. Choose a file (make sure it’s one of the allowed types: jpg, jpeg, png, pdf).
2. Submit the form.
3. You should receive a success message and a link to download the uploaded file.

## Conclusion

In this tutorial, you learned how to implement file uploading in a Laravel application. You created a form for file uploads, handled the file upload in a controller, and displayed success messages along with downloadable links to the uploaded files. You can further enhance this feature by adding more validation, handling multiple file uploads, or integrating it with a database to keep track of uploads.
