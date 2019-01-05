<?php

namespace App\Http\Controllers;


use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\XmlService;
use Illuminate\Http\Response;


class SoapController extends Controller
{
    use ApiResponser;

    /**
     * hacemos uso del service de XML para consumir el microservice Soap
     * @var BookService
     */
    public $XmlService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(XmlService $XmlService)
    {
        $this->XmlService = $XmlService;

    }

    /**
     * Retornamos un listado de  books
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->XmlService->obtainCurrency());
    }

    /**
     * Creamos un nuevo book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        return $this->successResponse($this->XmlService->convertCurrency($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtenemos datos de un book
     * @return Illuminate\Http\Response
     */
    public function docentes(Request $request)
    {
        return $this->successResponse($this->XmlService->obtainDocente($request->all(), Response::HTTP_CREATED));
    }


}
