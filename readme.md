## Laravel Customable Auth Provider
This package allowed you to use a credentials field other than a password as default laravel credentials

### Requirements

- PHP 5.5
- Laravel >= 5.2 

Installation
------------

To install the PHP client library using Composer:
    composer require bhoechie/laravel-customable-auth
    
Then add `Bhoechie\CustomableAuth\AuthServiceProvider` to the `providers` array in your `config/app.php`  before application service provider:

    Bhoechie\CustomableAuth\AuthServiceProvider::class
    
    /*
    * Application Service Providers...
    */
    
    
Configuration
-------------
 
You must publish config using `artisan vendor:publish` to copy the distribution configuration file to your app's config directory:

    php artisan vendor:publish
    
Then set either the `password_field` base on your database password name.
