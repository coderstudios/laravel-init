Laravel Init
==========

A package in PHP for use with a Laravel 8+ project. Recommended to be used with a clean fresh install of Laravel. 

## Composer

To install Laravel Init as a Composer package to be used with Laravel 8+, simply add this to your composer.json:

```json
"coderstudios/laravel-init": "1.0.*"
```

On a fresh install of Laravel run:

1. php artisan vendor:publish --provider="CoderStudios\LaravelInit\LaravelInitServiceProvider"
2. php artisan migrate
3. php artisan csinit:install

## Documentation

Once the package is installed you can add

```
    "@php artisan csinit:update"
```

to your composer.json so that on package update, any cached data or views get cleared automatically to account for any new package updates

Example update composer.json file

```
    "@php artisan package:discover",
    "@php artisan csinit:update"

``` 

## Copyright and Licence

Laravel Init has been written by Coder Studios Ltd