<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Book",
 *     type="object",
 *     title="Book",
 *     required={"code", "title", "author", "stock"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the book"
 *     ),
 *     @OA\Property(
 *         property="code",
 *         type="string",
 *         description="Code of the book"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Title of the book"
 *     ),
 *     @OA\Property(
 *         property="author",
 *         type="string",
 *         description="Author of the book"
 *     ),
 *     @OA\Property(
 *         property="stock",
 *         type="integer",
 *         description="Stock of the book"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Update timestamp"
 *     )
 * )
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'title', 'author', 'stock'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
