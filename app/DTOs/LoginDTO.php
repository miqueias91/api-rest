<?php

declare(strict_types=1);

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

final class LoginDTO extends ValidatedDTO
{
    public string $email;

    public string $password;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [];
    }
}
