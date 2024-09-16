<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Common\Responses\ApiSuccessResponse;
use App\DTOs\LoginDTO;
use App\Facades\LoginService;
use App\Resources\LoginResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   version="1.0.0",
 *   title="API Rest",
 *
 *   @OA\License(name="MIT"),
 *
 * 
 * )
 */
class AuthController extends Controller
{
    public function __construct() {}

    /**
     *  @OA\Post(
     *      path="/api/v1/auth/login",
     *      summary="Login user",
     *      description="Login user",
     *      tags={"Autenticate"},
    *     @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 @OA\Property(
    *                     property="email",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="password",
    *                     type="string"
    *                 ),
    *             )
    *         )
    *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *      ),
     *     @OA\Response(
     *           response=400,
     *           description="Bad Request"),
     *
     *  )
     */
    public function login(LoginDTO $dto): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new LoginResource(LoginService::login($dto)));
    }
}
