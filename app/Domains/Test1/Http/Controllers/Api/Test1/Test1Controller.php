<?php

namespace App\Domains\Test1\Http\Controllers\Api\Test1;

use App\Http\Controllers\Controller;
use App\Domains\Test1\Models\Test1;
use Illuminate\Http\Request;

/**
 * Class Test1Controller.
 */
class Test1Controller extends Controller
{
    /**
     * @OA\Get(
     * path="/api/test1",
     * summary="Get All Test1s",
     * description="Show All Test1s",
     * operationId="getAllTest1s",
     * tags={"Test1"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test1 are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function index()
    {
        return Test1::all();
    }



    /**
     * @OA\Get(
     * path="/api/test1/{id}",
     * summary="Get Test1 by id",
     * description="Show one Test1 by id",
     * operationId="getOneTest1s",
     * tags={"test1"},
     * @OA\Parameter(
     *    description="ID of test1",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when test1 id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test1 is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Test1 $test1)
    {
        return $test1;
    }

    /**
     * @OA\Post (
     * path="/api/test1",
     * summary="Create New Test1",
     * description="Create One Test1",
     * operationId="postOneTest1s",
     * tags={"test1"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Test1 fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when name or description deos'nt o the RequestBody ",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="name and description field are required"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test1 has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $test1 = Test1::create($request->all());
        return response()->json($test1, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/test1/{id}",
     * summary="Edit one Test1 by id",
     * description="update One Test1 by id",
     * operationId="postOneTest1s",
     * tags={"test1"},
     * @OA\Parameter(
     *    description="ID of test1",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Test1 fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test1 has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Test1 $test1)
    {
        $test1->update($request->all());

        return response()->json($test1, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/test1/{id}",
     * summary="delete Test1 by id",
     * description="delete one Test1 by id",
     * operationId="deleteOneTest1s",
     * tags={"test1"},
     * @OA\Parameter(
     *    description="ID of test1",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when test1 id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test1s are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="mobile", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Test1 $test1)
    {
        $test1->delete();

        return response()->json($test1, 200);
    }
}