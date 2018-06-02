# Lumen API Development

In this project I ma using MongoDB and MySQL. The basic MongoDB has been covered till 
"commit aa73c0e8dbb6d75dbbc46e5b80d734e1184e4c6b". After that I have used MySQL. To use MongoDB I have been using this git package 
https://github.com/jenssegers/laravel-mongodb/blob/master/README.md

Read their documentation 


__Installation using composer :__  
`composer require jenssegers/mongodb`
### Laravel version Compatibility

 Laravel  | Package
:---------|:----------
 4.2.x    | 2.0.x
 5.0.x    | 2.1.x
 5.1.x    | 2.2.x or 3.0.x
 5.2.x    | 2.3.x or 3.0.x
 5.3.x    | 3.1.x or 3.2.x
 5.4.x    | 3.2.x
 5.5.x    | 3.3.x
 5.6.x    | 3.4.x



add the service provider in `bootstrap/app.php`.    

```php
$app->register(Jenssegers\Mongodb\MongodbServiceProvider::class);

$app->withEloquent();
``` 

###Changes in Model

Please change all `Jenssegers\Mongodb\Model` references to `Jenssegers\Mongodb\Eloquent\Model` either at the top of your model files, or your registered alias.

```php
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent {}
```  

Embedded relations now return an `Illuminate\Database\Eloquent\Collection` rather than a custom Collection class. If you were using one of the special methods that were available, convert them to Collection operations.

```php
$books = $user->books()->sortBy('title');
```

Configuration
-------------

Change your default database connection name in `/vendor/laravel/lumen-framework/config/database.php`:

```php
'default' => env('DB_CONNECTION', 'mongodb'),
```

And add a new mongodb connection:

```php
'mongodb' => [
    'driver'   => 'mongodb',
    'host'     => env('DB_HOST', 'localhost'),
    'port'     => env('DB_PORT', 27017),
    'database' => env('DB_DATABASE'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'options'  => [
        'database' => 'admin' // sets the authentication database required by mongo 3
    ]
],
```
