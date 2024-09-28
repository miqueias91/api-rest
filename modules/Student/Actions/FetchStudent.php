<?php

declare(strict_types=1);

namespace Modules\Student\Actions;

use Modules\Student\Models\Student;

final readonly class FetchStudent
{
    public function handle(string $uuid): Student
    {
        return Student::where('uuid', $uuid)->all()->firstOrFail();
    }
}
