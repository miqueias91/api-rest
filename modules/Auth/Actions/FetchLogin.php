<?php

declare(strict_types=1);

namespace Modules\Auth\Actions;

use Illuminate\Validation\ValidationException;
use Modules\Auth\DTOs\LoginDTO;

final readonly class FetchLogin
{
    public function handle(LoginDTO $dto): array
    {
        try {
            $token = auth('api')->attempt($dto->toArray());

            if (! $token) {
                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

            session(['key' => 'value']);

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
