<?php

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

/**
 * @OA\Tag(
 *     name="Members",
 *     description="API Endpoints for Member Operations"
 * )
 */

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
 *                 ref="#/components/schemas/Member"
 *             ),
 *         ),
 *     ),
 * )
 */
