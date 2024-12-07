# Laravel Migrations Tutorial

## What is Migration?

In Laravel, migrations are a type of version control for your database schema. They allow you to define and modify database tables and columns in a structured way. Migrations provide a way to track changes to your database schema, ensuring that it remains consistent across different environments (e.g., development, staging, production).

## Folder Structure

Migration files are located in the `database/migrations` directory of your Laravel application. Each migration file includes a timestamp in its filename, which helps determine the order in which migrations should be applied.

```
database/
migrations/
2024_01_01_000000_create_users_table.php
2024_01_02_000001_add_email_verified_at_to_users_table.php
2024_01_03_000002_create_posts_table.php
...
```

## Creating Migrations

To create a new migration file, use the `make:migration` Artisan command. Here’s the general syntax:

```bash
php artisan make:migration create_table_name
```

### Example

To create a migration for a new `posts` table:

```bash
php artisan make:migration create_posts_table
```

This command will generate a new migration file in the `database/migrations` directory.

## Migration Constraints

When defining your database schema, you can add various constraints to your tables:

### Not Null

To ensure a column cannot have a NULL value, use the `->nullable(false)` method:

```php
$table->string('title')->nullable(false);
```

### Unique

To enforce that a column's value must be unique across the table:

```php
$table->string('email')->unique();
```

### Default Values

To set a default value for a column:

```php
$table->boolean('is_active')->default(true);
```

### Indexes

To create an index on a column to speed up queries:

```php
$table->index('column_name');
```

## Foreign Keys

Foreign keys establish a relationship between tables. They ensure referential integrity by enforcing that a value in one table must exist in another table.

### Adding Foreign Keys

To add a foreign key constraint to a migration:

1. **Create the migration file:**

    ```bash
    php artisan make:migration add_user_id_to_posts_table --table=posts
    ```

2. **Update the migration file to add the foreign key:**

    ```php
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
    ```

    - **`unsignedBigInteger`**: Defines the column that will be used as a foreign key.
    - **`foreign`**: Specifies the foreign key constraint.
    - **`references`**: Indicates the column in the referenced table.
    - **`on`**: Specifies the table being referenced.
    - **`onDelete('cascade')`**: Automatically deletes related records when the referenced record is deleted.

## Running Migrations

To apply all pending migrations, use the following command:

```bash
php artisan migrate
```

This command will execute all migration files that have not yet been applied to the database.

## Rolling Back Migrations

To undo the last batch of migrations, use:

```bash
php artisan migrate:rollback
```

If you need to roll back all migrations, use:

```bash
php artisan migrate:reset
```

To roll back all migrations and then re-run them, use:

```bash
php artisan migrate:refresh
```
## Configuring the Database Connection

Before running migrations, ensure your database connection is correctly configured in your `.env` file. Here’s how to set it up:

### Database Configuration in `.env`

Open the `.env` file located at the root of your Laravel project and configure the database settings. Here’s an example configuration for different database types:

#### MySQL

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

#### PostgresSQL

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

#### SQLite

```env
DB_CONNECTION=sqlite
DB_DATABASE=/path_to_your_database/database.sqlite
```

- **`DB_CONNECTION`**: Specifies the type of database connection (e.g., `mysql`, `pgsql`, `sqlite`).
- **`DB_HOST`**: The database server address.
- **`DB_PORT`**: The port on which the database server is running.
- **`DB_DATABASE`**: The name of the database.
- **`DB_USERNAME`**: The username for connecting to the database.
- **`DB_PASSWORD`**: The password for connecting to the database.

## Best Practices

- **Write Descriptive Migration Names:** Use clear and descriptive names for your migration files to indicate their purpose.
- **Keep Migrations Focused:** Each migration should perform a single, logical change to the schema.
- **Test Migrations Thoroughly:** Test migrations in a staging environment before applying them to production.
- **Use Version Control:** Track your migrations in version control to maintain consistency across different environments.

## Examples

### Example 1: Creating a Table

To create a `posts` table:

```bash
php artisan make:migration create_posts_table
```

In the migration file:

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('body');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('posts');
}
```

### Example 2: Adding a Column with Constraints

To add a `published_at` column to the `posts` table:

```bash
php artisan make:migration add_published_at_to_posts_table --table=posts
```

In the migration file:

```php
public function up()
{
    Schema::table('posts', function (Blueprint $table) {
        $table->timestamp('published_at')->nullable()->default(null);
    });
}

public function down()
{
    Schema::table('posts', function (Blueprint $table) {
        $table->dropColumn('published_at');
    });
}
```
