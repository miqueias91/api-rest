<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Common\DTOs\DatatableDTO;
use App\Common\Responses\ApiSuccessResponse;
use App\DTOs\StudentsDTO;
use App\Facades\StudentsService;
use App\Resources\StudentsResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

class StudentsController extends Controller
{

    public function __construct() {}

    /**
     *  @OA\Get(
     *      path="/api/v1/students",
     *      summary="Fetch Students list",
     *      description="Fetch Students list",
     *      tags={"Students"},
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
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function index(DatatableDTO $dto): JsonResponse
    {
        return StudentsResource::collection(StudentsService::index($dto))->response();
    }

    /**
     *  @OA\Get(
     *      path="/api/v1/students/{id}",
     *      summary="Fetch Student",
     *      description="Fetch Student",
     *      tags={"Students"},
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *      ),
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *
     *      )
     *  )
     */
    public function show(string $id): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new StudentsResource(StudentsService::show($id)));
    }

    /**
     *  @OA\Post(
     *      path="/api/v1/students",
     *      summary="Create Student",
     *      description="Create Student",
     *      tags={"Students"},
    *     @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 @OA\Property(
    *                     property="name",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="email",
    *                     type="string"
    *                 ),
    *             )
    *         )
    *     ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *      ),
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized"),
     *      )
     *  )
     */
    public function store(StudentsDTO $dto): ApiSuccessResponse
    {
        return new ApiSuccessResponse(
            new StudentsResource(StudentsService::store($dto)),
            Response::HTTP_CREATED
        );
    }
}
