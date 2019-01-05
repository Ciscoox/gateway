<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * Ruta principal para consumir el servicio de author
     * @var string
     */
    public $baseUri;

    /**
     * secret key para consumir el servicio de author
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Obtenemos el listado total de todos los author
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    /**
     * Creamos un author usando el service author
     * @return string
     */
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Obtenemos un solo author usando el service author
     * @return string
     */
    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}");
    }

    /**
     * actualizamos las instancias del modelo usando el service de author
     * @return string
     */
    public function editAuthor($data, $author)
    {
        return $this->performRequest('PUT', "/authors/{$author}", $data);
    }

    /**
     * Eliminamos un author usando el service de author
     * @return string
     */
    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/{$author}");
    }
}
