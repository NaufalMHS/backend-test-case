<?php
namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * @OA\Tag(
 *     name="Borrow",
 *     description="API Endpoints for Borrow Operations"
 * )
 */
class BorrowController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/borrow",
     *     operationId="borrowBook",
     *     tags={"Borrow"},
     *     summary="Borrow a book",
     *     description="Borrow a book for a member",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"book_id", "member_id"},
     *             @OA\Property(property="book_id", type="integer", example="1"),
     *             @OA\Property(property="member_id", type="integer", example="1"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Borrow")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Member tidak boleh meminjam lebih dari 2 buku"),
     *         )
     *     ),
     * )
     */
    public function borrow(Request $request)
    {
        
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
        ]);

        $member = Member::find($request->member_id);
        $book = Book::find($request->book_id);

        // Cek syarat meminjam
        if ($member->borrows()->whereNull('returned_at')->count() >= 2) {
            return response()->json(['error' => 'Member tidak boleh meminjam lebih dari 2 buku'], 400);
        }

        if ($member->penalty_until && $member->penalty_until->isFuture()) {
            return response()->json(['error' => 'Member sedang dalam masa penalti'], 400);
        }

        if ($book->stock < 1) {
            return response()->json(['error' => 'Buku tidak tersedia'], 400);
        }

        // Proses peminjaman
        $borrow = Borrow::create([
            'book_id' => $book->id,
            'member_id' => $member->id,
            'borrowed_at' => now(),
        ]);

        $book->decrement('stock');

        return response()->json($borrow, 201);
    }

// swagger

/**
     * @OA\POST(
     *     path="/api/return/{id}",
     *     operationId="returnBook",
     *     tags={"Borrow"},
     *     summary="Return a borrowed book",
     *     description="Return a borrowed book by providing the borrow ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the borrow",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Borrow")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Buku sudah dikembalikan"),
     *         )
     *     ),
     * )
     */

    public function returnBook($id, Request $request)
    {
        $borrow = Borrow::findOrFail($id);
        $member = Member::findOrFail($borrow->member_id);
    
        if ($borrow->returned_at) {
            return response()->json(['error' => 'Buku sudah dikembalikan'], 400);
        }
    
        $borrow->update(['returned_at' => now()]);
    
        $book = $borrow->book;
        $book->increment('stock');
    
        $borrowedAt = Carbon::parse($borrow->borrowed_at); // Mengonversi ke objek Carbon
        if ($borrowedAt->diffInDays(now()) > 7) {
            $member->update(['penalty_until' => now()->addDays(3)]);
        }
    
        return response()->json($borrow, 200);
    }
    
}
