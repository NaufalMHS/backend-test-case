<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/members",
     *     operationId="getMembersList",
     *     tags={"Members"},
     *     summary="Get list of members",
     *     description="Returns list of members with borrowed books count",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example="1"),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="borrowed_books", type="integer", example="2"),
     *             ),
     *         ),
     *     ),
     * )
     */
    
    public function index()
    {
        $members = Member::with('borrows')->get()->map(function ($member) {
            return [
                'id' => $member->id,
                'name' => $member->name,
                'borrowed_books' => $member->borrows->whereNull('returned_at')->count(),
            ];
        });

        return response()->json($members, 200);
    }
}
