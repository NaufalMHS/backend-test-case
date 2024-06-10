<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Library API",
 *     version="1.0.0",
 *     description="API Documentation for the Library"
 * )
 */
class BookController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/books",
     *     operationId="getBooksList",
     *     tags={"Books"},
     *     summary="Get list of books",
     *     description="Returns list of books",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Book")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
}
