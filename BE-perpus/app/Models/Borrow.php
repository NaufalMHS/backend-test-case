<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Borrow",
 *     type="object",
 *     title="Borrow",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the borrow"
 *     ),
 *     @OA\Property(
 *         property="book_id",
 *         type="integer",
 *         description="ID of the borrowed book"
 *     ),
 *     @OA\Property(
 *         property="member_id",
 *         type="integer",
 *         description="ID of the borrowing member"
 *     ),
 *     @OA\Property(
 *         property="borrowed_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the book was borrowed"
 *     ),
 *     @OA\Property(
 *         property="returned_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the book was returned"
 *     ),
 * )
 */

class Borrow extends Model
{
    protected $fillable = ['book_id', 'member_id', 'borrowed_at', 'returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
