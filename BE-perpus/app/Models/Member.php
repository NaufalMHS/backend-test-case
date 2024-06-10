<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    /**
 * @OA\Schema(
 *     schema="Member",
 *     type="object",
 *     title="Member",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the member"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the member"
 *     ),
 *     @OA\Property(
 *         property="borrowed_books",
 *         type="integer",
 *         description="Count of borrowed books by the member"
 *     ),
 * )
 */
    protected $fillable = ['code', 'name', 'penalty_until'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
