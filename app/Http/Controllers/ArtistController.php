<?php
namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;


/**
 * @OA\Schema(
 *     schema="Artist",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the artist"
 *     ),
 *     @OA\Property(
 *         property="bio",
 *         type="string",
 *         description="Biography of the artist"
 *     )
 * )
 */
class ArtistController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/artists",
     *     tags={"Artists"},
     *     summary="Get list of artists",
     *     @OA\Response(response="200", description="List of artists")
     * )
     */
    public function index()
    {
        return Artist::with('perfumes')->get();
    }

    /**
     * @OA\Get(
     *     path="/api/artists/{id}",
     *     tags={"Artists"},
     *     summary="Get artist by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Artist data")
     * )
     */
    public function show($id)
    {
        return Artist::with('perfumes')->findOrFail($id);
    }

    /**
     * @OA\Post(
     *     path="/api/artists",
     *     tags={"Artists"},
     *     summary="Create a new artist",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Artist")
     *     ),
     *     @OA\Response(response="201", description="Artist created")
     * )
     */
    public function store(Request $request)
    {
        $artist = Artist::create($request->all());
        return response()->json($artist, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/artists/{id}",
     *     tags={"Artists"},
     *     summary="Update an artist",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Artist")
     *     ),
     *     @OA\Response(response="200", description="Artist updated")
     * )
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->update($request->all());
        return response()->json($artist, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/artists/{id}",
     *     tags={"Artists"},
     *     summary="Delete an artist",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Artist deleted")
     * )
     */
    public function destroy($id)
    {
        Artist::destroy($id);
        return response()->json(null, 204);
    }
}
