<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/books', [BookController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);
Route::post('/borrow', [BorrowController::class, 'borrow']);
Route::post('/return/{id}', [BorrowController::class, 'returnBook']);
