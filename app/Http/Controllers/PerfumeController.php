<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Perfume",
 *     type="object",
 *     required={"name", "designer", "collection", "gender", "notes"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the perfume"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the perfume"
 *     ),
 *     @OA\Property(
 *         property="designer",
 *         type="string",
 *         description="Designer of the perfume"
 *     ),
 *     @OA\Property(
 *         property="collection",
 *         type="string",
 *         description="Collection to which the perfume belongs"
 *     ),
 *     @OA\Property(
 *         property="gender",
 *         type="string",
 *         description="Gender category of the perfume (e.g., male, female, unisex)"
 *     ),
 *     @OA\Property(
 *         property="notes",
 *         type="string",
 *         description="Notes of the perfume (e.g., top notes, heart notes, base notes)"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Detailed description of the perfume"
 *     ),
 *     @OA\Property(
 *         property="thumbnail",
 *         type="string",
 *         format="url",
 *         description="URL of the thumbnail image of the perfume"
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         format="url",
 *         description="URL of the main image of the perfume"
 *     ),
 *     @OA\Property(
 *         property="rating",
 *         type="number",
 *         format="float",
 *         description="Rating of the perfume"
 *     ),
 *     @OA\Property(
 *         property="year",
 *         type="integer",
 *         description="Year the perfume was released"
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         format="url",
 *         description="URL to more information about the perfume"
 *     )
 * )
 */
class PerfumeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/perfumes",
     *     tags={"Perfumes"},
     *     summary="Get list of perfumes",
     *     @OA\Response(response="200", description="List of perfumes")
     * )
     */
    public function index()
    {
        return Perfume::with('artist')->get();
    }

    /**
     * @OA\Get(
     *     path="/api/perfumes/{id}",
     *     tags={"Perfumes"},
     *     summary="Get perfume by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Perfume data")
     * )
     */
    public function show($id)
    {
        return Perfume::with('artist')->findOrFail($id);
    }

    /**
     * @OA\Post(
     *     path="/api/perfumes",
     *     tags={"Perfumes"},
     *     summary="Create a new perfume",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Perfume")
     *     ),
     *     @OA\Response(response="201", description="Perfume created")
     * )
     */
    public function store(Request $request)
    {
        $perfume = Perfume::create($request->all());
        return response()->json($perfume, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/perfumes/{id}",
     *     tags={"Perfumes"},
     *     summary="Update a perfume",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Perfume")
     *     ),
     *     @OA\Response(response="200", description="Perfume updated")
     * )
     */
    public function update(Request $request, $id)
    {
        $perfume = Perfume::findOrFail($id);
        $perfume->update($request->all());
        return response()->json($perfume, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/perfumes/{id}",
     *     tags={"Perfumes"},
     *     summary="Delete a perfume",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Perfume deleted")
     * )
     */
    public function destroy($id)
    {
        Perfume::destroy($id);
        return response()->json(null, 204);
    }
}


