## Create project
```bash
composer create-project laravel/laravel name_project
```
## CSS custom
* Create a folder **css** under the public/ directory
* In directory **css**, save your custom css file
* Inside of tag head copy
```html
<link rel="stylesheet" href="{{ asset('css/yout_file.css') }}">
```
## Blade templates
* In resources/views, create a new folder **layouts**
* In **layouts**, create a new file app.blade.php
## Change Timezone
* In file config/app.php change
```bash
'timezone' => 'Europe/Madrid',
```
## Change Locale Configuration
* In file config/app.php change
```bash
'locale' => 'es',
```
## Laravel Storage
```bash
php artisan storage:link
```
* A folder **storage** is created in the folder /public
## Product
* In resources/views/, create a subfolder **product**
* In **product**, create a new file index.blade.php
* In **product**, create a new file show.blade.php
## Model Product
* The model Product is used by ProductController and AdminProductController
## Installing laravel/ui authentication system
```bash
composer require laravel/ui
```
# Generate the frontend scaffolding and the login system
```bash
php artisan ui bootstrap --auth
```
* Type “no” to questions
* Are created app/Http/Controllers/Auth folder
## Customizing the authentication system
* In web.php remove 
* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
* In app/Providers/RouteServiceProvider.php, replace the **HOME** by '**/**'
## User roles
* We adds two columns to the users table
```bash
php artisan make:migration role_users_table
```
* The role column will be used to know if a user is an admin or client
* In the balance column, we will store the user’s balance.
* Modify User model
```php
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance' // add this line 
    ];

```
* Execute in terminal 
```bash
php artisan migrate
```

## Modify the auth RegisterController
```php
protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'balance' => '5000' // add this line
        ]);
    }
```
## middleware admin and users
* To create a new middleware execute in terminal
```bash
php artisan make:middleware AdminAuthMiddleware
```
* In app/Http/Middleware/AdminAuthMiddleware.php import use Illuminate\Support\Facades\Auth;
* Copy the folowing code inside the function handle
```php
        if (Auth::user() && Auth::user()->role == 'admin') {
            return $next($request);
        } else {
            return redirect()->route('home.index');
        }
```
## Registering AdminAuthMiddleware
* In app/Http/Kernel.php, make the following changes.
** Tn method protected $routeMiddleware add
```php
    'admin' => \App\Http\Middleware\AdminAuthMiddleware::class
```
* In routes/web.php, We grouped all /admin/* routes around the new middleware.
```php
    Route::middleware('admin')->group(function () {
    // add all admin routes
});
```
## Cart views
* In resources/views/, create a subfolder **cart**
* In resources/views/cart , create a new file index.blade.php
## Orders and Items
* Order migration
```php
php artisan make:migration create_orders_table
```
* Item migration
```php
php artisan make:migration create_items_table
```
```php
php artisan migrate
```
* Create Order and Item model
## Orders Page
* create a new file MyAccountController.php
* create a subfolder **myaccount**, in resources/views/myaccount , create a new file orders.blade.php.










