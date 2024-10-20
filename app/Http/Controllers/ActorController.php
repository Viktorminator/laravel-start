<?php
namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;


/**
 * @OA\Schema(
 *     schema="Actor",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the actor"
 *     ),
 *     @OA\Property(
 *         property="bio",
 *         type="string",
 *         description="Biography of the actor"
 *     )
 * )
 */
class ActorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/actors",
     *     tags={"Actors"},
     *     summary="Get list of actors",
     *     @OA\Response(response="200", description="List of actors")
     * )
     */
    public function index(Request $request)
    {
        $actors = Actor::with('perfumes:resource_id,name')->get();

        return ActorResource::collection($actors)->toArray($request);
    }

    /**
     * @OA\Get(
     *     path="/api/actors/{id}",
     *     tags={"Actors"},
     *     summary="Get actor by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Actor data")
     * )
     */
    public function show($id)
    {
        return Actor::with('perfumes')->findOrFail($id);
    }

    /**
     * @OA\Post(
     *     path="/api/actors",
     *     tags={"Actors"},
     *     summary="Create a new actor",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Actor")
     *     ),
     *     @OA\Response(response="201", description="Actor created")
     * )
     */
    public function store(Request $request)
    {
        $actor = Actor::create($request->all());
        return response()->json($actor, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/actors/{id}",
     *     tags={"Actors"},
     *     summary="Update an actor",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Actor")
     *     ),
     *     @OA\Response(response="200", description="Actor updated")
     * )
     */
    public function update(Request $request, $id)
    {
        $actor = Actor::findOrFail($id);
        $actor->update($request->all());
        return response()->json($actor, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/actors/{id}",
     *     tags={"Actors"},
     *     summary="Delete an actor",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Actor deleted")
     * )
     */
    public function destroy($id)
    {
        Actor::destroy($id);
        return response()->json(null, 204);
    }
}
