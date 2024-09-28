<?php

declare(strict_types=1);

namespace Modules\Student\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

final class CreateStudentDTO extends ValidatedDTO
{
    public string $name;

    public string $email;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'unique:students,email'],
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
