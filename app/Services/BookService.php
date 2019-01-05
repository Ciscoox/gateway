<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * Ruta base para comsumir el service de book
     * @var string
     */
    public $baseUri;

    /**
     * Secret key para consumir el service de book
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Obtenemos un listado full desde el service de book
     * @return string
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Creamos un book usuando el service book
     * @return string
     */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Obtenemos un book usando el service book
     * @return string
     */
    public function obtainBook($book)
    {
        return $this->performRequest('GET', "/books/{$book}");
    }

    /**
     * Actualizamos la instancia de book usando el service de book
     * @return string
     */
    public function editBook($data, $book)
    {
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /**
     * Eliminamos un book usando el service de book
     * @return string
     */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/{$book}");
    }
}
