<?php

return [
    'authors' => [
        'base_uri' => env('AUTHORS_SERVICE_BASE_URL'),
        'secret' => env('AUTHORS_SERVICE_SECRET'),
    ],

    'books' => [
        'base_uri' => env('BOOKS_SERVICE_BASE_URL'),
        'secret' => env('BOOKS_SERVICE_SECRET'),
    ],

    'xml' => [
        'base_uri' => env('XML_SERVICE_BASE_URL'),
        'secret' => env('XML_SERVICE_SECRET'),
    ],
];
