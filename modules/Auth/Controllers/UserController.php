<?php

declare(strict_types=1);

namespace Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Auth\Actions\CreateUser;
use Modules\Auth\Actions\DeleteUser;
use Modules\Auth\Actions\FetchUser;
use Modules\Auth\Actions\FetchUsersList;
use Modules\Auth\Actions\UpdateUser;
use Modules\Auth\DTOs\CreateUserDTO;
use Modules\Auth\DTOs\UpdateUserDTO;
use Modules\Auth\Resources\UserResource;
use Modules\Common\Core\DTOs\DatatableDTO;
use Modules\Common\Core\Responses\ApiSuccessResponse;
use Modules\Common\Core\Responses\NoContentResponse;
use OpenApi\Annotations as OA;

final class UserController extends Controller
{
    /**
     *  @OA\Get(
     *      path="/api/v1/users",
     *      summary="Fetch Users list",
     *      description="Fetch Users list",
     *      tags={"Users"},
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
     *                          "name": "User",
     *                          "email": "user@example.com",
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
    public function index(DatatableDTO $dto, FetchUsersList $action): JsonResponse
    {
        return UserResource::collection($action->handle($dto))->response();
    }

    /**
     *  @OA\Get(
     *      path="/api/v1/users/{uuid}",
     *      summary="Fetch User",
     *      description="Fetch User",
     *      tags={"Users"},
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
     *                          "name": "User",
     *                          "email": "user@example.com",
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
    public function show(string $uuid, FetchUser $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new UserResource($action->handle($uuid)));
    }

    /**
     *  @OA\Post(
     *      path="/api/v1/users/{uuid}",
     *      summary="Create User",
     *      description="Create User",
     *      tags={"Users"},
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
     *                          "name": "User",
     *                          "email": "user@example.com",
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
    public function store(CreateUserDTO $dto, CreateUser $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(
            new UserResource($action->handle($dto)),
            Response::HTTP_CREATED
        );
    }

    /**
     *  @OA\Put(
     *      path="/api/v1/users/{uuid}",
     *      summary="Update User",
     *      description="Update User",
     *      tags={"Users"},
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
     *                          "name": "User",
     *                          "email": "user@example.com",
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
    public function update(UpdateUserDTO $dto, string $uuid, UpdateUser $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new UserResource($action->handle($uuid, $dto)));
    }

    /**
     *  @OA\Delete(
     *      path="/api/v1/users/{uuid}",
     *      summary="Delete User",
     *      description="Delete User",
     *      tags={"Users"},
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
    public function destroy(string $uuid, DeleteUser $action): NoContentResponse
    {
        $action->handle($uuid);

        return new NoContentResponse;
    }
}
