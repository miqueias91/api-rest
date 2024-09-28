<?php

declare(strict_types=1);

namespace Modules\Auth\DTOs;

use Illuminate\Validation\Rules\Password;
//use Modules\Auth\Models\Role;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

final class CreateUserDTO extends ValidatedDTO
{
    public string $name;

    public string $email;

    public string $password;

    //public Role $role;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                Password::min(8),
                'confirmed',
            ],
            //'role' => ['sometimes', 'string', 'exists:roles,name', 'not_in:super-admin'],
        ];
    }

    protected function defaults(): array
    {
        return [
            //'role' => 'user',
        ];
    }

    protected function casts(): array
    {
        return [
            //'role' => fn (string $property, mixed $value) => Role::findByName($value),
        ];
    }
}
