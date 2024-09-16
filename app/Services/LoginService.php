<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\LoginDTO;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function __construct() {}

    public function login(LoginDTO $dto): array
    {
        try {
            $token = auth('api')->attempt($dto->toArray());

            if (! $token) {
                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

            return [
                'type' => 'Bearer',
                'token' => $token,
            ];
        } catch (\Exception $e) {
            report($e);
            abort(400, $e->getMessage());
        }
    }
}
