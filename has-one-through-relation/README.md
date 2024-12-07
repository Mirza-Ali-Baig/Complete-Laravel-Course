## Laravel Application Setup: User, Company Information (Has-One-Through Relationship)

### Scenario

In this scenario, each `User` has one associated `CompanyInformation`, but we don't have a direct relationship between `User` and `CompanyInformation`. Instead, the `Company` model acts as an intermediary between `User` and `CompanyInformation`. We will set up the database tables, define the relationships, and demonstrate how to use these models to find a user's company information without relying on the `Company` model.
### Step 1: Create Migration Files

1. **Create the Users Table**

   ```bash
   php artisan make:migration create_users_table --create=users
   ```

   ```php
   // database/migrations/xxxx_xx_xx_create_users_table.php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class CreateUsersTable extends Migration
   {
       public function up()
       {
           Schema::create('users', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->string('email')->unique();
               $table->string('password');
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('users');
       }
   }
   ```

2. **Create the Companies Table**

   ```bash
   php artisan make:migration create_companies_table --create=companies
   ```

   ```php
   // database/migrations/xxxx_xx_xx_create_companies_table.php
   class CreateCompaniesTable extends Migration
   {
       public function up()
       {
           Schema::create('companies', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('companies');
       }
   }
   ```

3. **Create the Company Information Table**

   ```bash
   php artisan make:migration create_company_information_table --create=company_information
   ```

   ```php
   // database/migrations/xxxx_xx_xx_create_company_information_table.php
   class CreateCompanyInformationTable extends Migration
   {
       public function up()
       {
           Schema::create('company_information', function (Blueprint $table) {
               $table->id();
               $table->foreignId('company_id')->constrained()->onDelete('cascade')->unique();
               $table->string('address')->nullable();
               $table->string('phone')->nullable();
               $table->string('website')->nullable();
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('company_information');
       }
   }
   ```

### Step 2: Run the Migrations

After defining the migration files, run the migrations:

```bash
php artisan migrate
```

### Step 3: Define the Models

1. **User Model**

   ```php
   // app/Models/User.php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class User extends Model
   {
       use HasFactory;

       protected $fillable = ['name', 'email', 'password'];

       public function company()
       {
           return $this->hasOne(Company::class);
       }

       public function companyInformation()
       {
           return $this->hasOneThrough(CompanyInformation::class, Company::class);
       }
   }
   ```

2. **Company Model**

   ```php
   // app/Models/Company.php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class Company extends Model
   {
       use HasFactory;

       protected $fillable = ['name', 'user_id'];

       public function user()
       {
           return $this->belongsTo(User::class);
       }

       public function information()
       {
           return $this->hasOne(CompanyInformation::class);
       }
   }
   ```

3. **CompanyInformation Model**

   ```php
   // app/Models/CompanyInformation.php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class CompanyInformation extends Model
   {
       use HasFactory;

       protected $fillable = ['company_id', 'address', 'phone', 'website'];

       public function company()
       {
           return $this->belongsTo(Company::class);
       }
   }
   ```

### Step 4: Usage Scenario

Here's how you can create a user, add a company, and retrieve company information.

#### Create a User and Company with Information

```php
// Using Tinker or a Seeder

use App\Models\User;
use App\Models\Company;
use App\Models\CompanyInformation;

// Create a new User
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => bcrypt('password'),
]);

// Create a Company for the User
$company = $user->company()->create(['name' => 'Example Corp']);

// Add Company Information
$company->information()->create([
    'address' => '123 Main St',
    'phone' => '555-5555',
    'website' => 'http://example.com',
]);
```

#### Retrieve User's Company Information

```php
$user = User::with('companyInformation')->find(1);

// Display the company information if it exists
if ($user->companyInformation) {
    echo "Company Name: " . $user->company->name . "\n";
    echo "Company Address: " . $user->companyInformation->address . "\n";
    echo "Company Phone: " . $user->companyInformation->phone . "\n";
    echo "Company Website: " . $user->companyInformation->website . "\n";
} else {
    echo "No company information available.\n";
}
```

### Conclusion

You have now set up a complete Laravel application with a has-one-through relationship between `User`, `Company`, and `CompanyInformation`. This includes creating the necessary migrations, defining the relationships, and demonstrating how to use these models in a practical scenario. You can expand upon this setup by adding validation, authentication, or additional features as needed.
