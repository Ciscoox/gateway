<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Http\Response;
use App\Services\AuthorService;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * El service que consume el microservice de book
     * @var BookService
     */
    public $bookService;

    /**
     * El service que consume el microservice de author
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Retornamos un listado de books
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Creamos un book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);

        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtenemos un book
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * Actualizamos si existe un book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    /**
     * Eliminamos un book
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}