<?php



$router->group(/**
 *
 */
    ['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * Rutas para authors
     */
    $router->get('/authors', 'AuthorController@index');
    $router->post('/authors', 'AuthorController@store');
    $router->get('/authors/{author}', 'AuthorController@show');
    $router->put('/authors/{author}', 'AuthorController@update');
    $router->patch('/authors/{author}', 'AuthorController@update');
    $router->delete('/authors/{author}', 'AuthorController@destroy');

    /**
     * Rutas para books
     */
    $router->get('/books', 'BookController@index');
    $router->post('/books', 'BookController@store');
    $router->get('/books/{book}', 'BookController@show');
    $router->put('/books/{book}', 'BookController@update');
    $router->patch('/books/{book}', 'BookController@update');
    $router->delete('/books/{book}', 'BookController@destroy');


    /**
     * Rutas XML
     */
    $router->post('/docentes','SoapController@docentes');
    $router->get('/currency','SoapController@index');
    $router->post('/currency','SoapController@store');
});
