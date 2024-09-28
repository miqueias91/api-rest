<?php

declare(strict_types=1);

namespace Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Modules\Auth\Actions\FetchLogin;
use Modules\Auth\DTOs\LoginDTO;
use Modules\Auth\Resources\LoginResource;
use Modules\Common\Core\Responses\ApiSuccessResponse;
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
final class AuthController extends Controller
{
    /**
     *  @OA\Post(
     *      path="/api/v1/auth/login",
     *      summary="Login user",
     *      description="Login user",
     *      tags={"Autenticate"},
     *
     *     @OA\RequestBody(
     *
     *         @OA\MediaType(
     *             mediaType="application/json",
     *
     *             @OA\Schema(
     *
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
     *
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
    public function login(LoginDTO $dto, FetchLogin $action): ApiSuccessResponse
    {
        return new ApiSuccessResponse(new LoginResource($action->handle($dto)));
    }
}
