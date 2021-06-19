<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Main admin data
    |--------------------------------------------------------------------------
    |
    | Admin will be created by seeding
    | User creation logic located at UserSeeder class
    |
    */

    'admin' => [
        'nickname'  => env('ADMIN_NICKNAME', 'Admin'),
        'email'     => env('ADMIN_EMAIL', 'admin@example.com'),
        'password'  => env('ADMIN_PASSWORD', '123456'),
    ],

];
