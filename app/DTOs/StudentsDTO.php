<?php

declare(strict_types=1);

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

final class StudentsDTO extends ValidatedDTO
{
    public string $name;

    public string $email;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
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
