<?php

declare(strict_types=1);

namespace Modules\Student\DTOs;

use Illuminate\Validation\Rules\Password;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

final class UpdateStudentDTO extends ValidatedDTO
{
    public ?string $name;

    public ?string $email;

    public ?string $current_password;

    public ?string $password;

    public bool $active;

    protected function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'min:4', 'max:255'],
            'email' => ['sometimes', 'email', 'unique:students,email,'.request()->route('uuid').',uuid'],
            'current_password' => ['required_with:password', 'string'],
            'password' => [
                'sometimes',
                Password::min(8),
                'confirmed',
            ],
            'active' => ['sometimes', 'boolean'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'active' => new BooleanCast,
        ];
    }
}
