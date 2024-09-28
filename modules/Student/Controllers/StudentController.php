<?php

declare(strict_types=1);

namespace Modules\Student\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Common\Core\DTOs\DatatableDTO;
use Modules\Common\Core\Responses\ApiSuccessResponse;
use Modules\Common\Core\Responses\NoContentResponse;
use Modules\Student\Actions\CreateStudent;
use Modules\Student\Actions\DeleteStudent;
use Modules\Student\Actions\FetchStudent;
use Modules\Student\Actions\FetchStudentsList;
use Modules\Student\Actions\UpdateStudent;
use Modules\Student\DTOs\CreateStudentDTO;
use Modules\Student\DTOs\UpdateStudentDTO;
use Modules\Student\Resources\StudentResource;
use OpenApi\Annotations as OA;

final class StudentController extends Controller
{
    /**
     *  @OA\Get(
     *      path="/api/v1/students",
     *      summary="Fetch Students list",
     *      description="Fetch Students list",
     *      tags={"Students"},
     *
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="search",
     *         required=false,
     *
     *         @OA\Schema(
     *             type="string"
     *         )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          content={
     *
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *
     *                 @OA\Schema(
     *
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         description="The response data",
     *
     *                         @OA\Items
     *                     ),
     *                     example={{
     *                          "id": "9d12795b-138b-47c9-912e-01eff34cdaa5",
     *                          "name": "Student",
     *                          "email": "student@example.com",
     *                          "active": true,
     *                          "created_at": "2024-09-22T17:38:29.000000Z",
     *                          "updated_at": "2024-09-22T17:38:29.000000Z"
     *                     }}
     *                 )
     *             )
     *         }
     *      ),
     *
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function index(DatatableDTO $dto, FetchStudentsList $action): JsonResponse
    {
        return StudentResource::collection($action->handle($dto))->response();
    }

    /**
     *  @OA\Get(
     *      path="/api/v1/students/{uuid}",
     *      summary="Fetch Student",
     *      description="Fetch Student",
     *      tags={"Students"},
     *
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          content={
     *
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *
     *                 @OA\Schema(
     *
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         description="The response data",
     *
     *                         @OA\Items
     *                     ),
     *                     example={
     *                          "id": "9d12795b-138b-47c9-912e-01eff34cdaa5",
     *                          "name": "Student",
     *                          "email": "student@example.com",
     *                          "active": true,
     *                          "created_at": "2024-09-22T17:38:29.000000Z",
     *                          "updated_at": "2024-09-22T17:38:29.000000Z"
     *                     }
     *                 )
     *             )
     *         }
     *      ),
     *
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function show(string $uuid, FetchStudent $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new StudentResource($action->handle($uuid)));
    }

    /**
     *  @OA\Post(
     *      path="/api/v1/students/{uuid}",
     *      summary="Create Student",
     *      description="Create Student",
     *      tags={"Students"},
     *
     *      @OA\RequestBody(
     *
     *         @OA\MediaType(
     *             mediaType="application/json",
     *
     *             @OA\Schema(
     *
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirmation",
     *                     type="string"
     *                 ),
     *             )
     *         )
     *     ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="OK",
     *          content={
     *
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *
     *                 @OA\Schema(
     *
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         description="The response data",
     *
     *                         @OA\Items
     *                     ),
     *                     example={
     *                          "id": "9d12795b-138b-47c9-912e-01eff34cdaa5",
     *                          "name": "Student",
     *                          "email": "student@example.com",
     *                          "active": true,
     *                          "created_at": "2024-09-22T17:38:29.000000Z",
     *                          "updated_at": "2024-09-22T17:38:29.000000Z"
     *                     }
     *                 )
     *             )
     *         }
     *      ),
     *
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function store(CreateStudentDTO $dto, CreateStudent $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(
            new StudentResource($action->handle($dto)),
            Response::HTTP_CREATED
        );
    }

    /**
     *  @OA\Put(
     *      path="/api/v1/students/{uuid}",
     *      summary="Update Student",
     *      description="Update Student",
     *      tags={"Students"},
     *
     *      @OA\RequestBody(
     *
     *         @OA\MediaType(
     *             mediaType="application/json",
     *
     *             @OA\Schema(
     *
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="current_password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirmation",
     *                     type="string"
     *                 ),
     *             )
     *         )
     *     ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          content={
     *
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *
     *                 @OA\Schema(
     *
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         description="The response data",
     *
     *                         @OA\Items
     *                     ),
     *                     example={
     *                          "id": "9d12795b-138b-47c9-912e-01eff34cdaa5",
     *                          "name": "Student",
     *                          "email": "student@example.com",
     *                          "active": true,
     *                          "created_at": "2024-09-22T17:38:29.000000Z",
     *                          "updated_at": "2024-09-22T17:38:29.000000Z"
     *                     }
     *                 )
     *             )
     *         }
     *      ),
     *
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function update(UpdateStudentDTO $dto, string $uuid, UpdateStudent $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new StudentResource($action->handle($uuid, $dto)));
    }

    /**
     *  @OA\Delete(
     *      path="/api/v1/students/{uuid}",
     *      summary="Delete Student",
     *      description="Delete Student",
     *      tags={"Students"},
     *
     *      @OA\Response(
     *          response=204,
     *          description="No Content",
     *      ),
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function destroy(string $uuid, DeleteStudent $action): NoContentResponse
    {
        $action->handle($uuid);

        return new NoContentResponse;
    }
}
