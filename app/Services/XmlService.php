<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class XmlService
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
        $this->baseUri = config('services.xml.base_uri');
        $this->secret = config('services.xml.secret');
    }

    /**
     * Obtenemos un listado full desde el service de book
     * @return string
     */
    public function obtainCurrency()
    {
        return $this->performRequest('GET', '/currency');
    }

    /**
     * Convertimos monedas usando el service xml
     * @return string
     */
    public function convertCurrency($data)
    {
        return $this->performRequest('POST', '/currency', $data);
    }

    /**
     * Obtenemos docentes usando el service xml
     * @return string
     */
    public function obtainDocente($data)
    {
        return $this->performRequest('POST', '/docentes',$data);
    }


}
