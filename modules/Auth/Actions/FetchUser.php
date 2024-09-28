<?php

declare(strict_types=1);

namespace Modules\Auth\Actions;

use Modules\Auth\Models\User;

final readonly class FetchUser
{
    public function handle(string $uuid): User
    {
        return User::where('uuid', $uuid)->all()->firstOrFail();
    }
}
