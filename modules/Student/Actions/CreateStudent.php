<?php

declare(strict_types=1);

namespace Modules\Student\Actions;

use Modules\Student\DTOs\CreateStudentDTO;
use Modules\Student\Models\Student;

final readonly class CreateStudent
{
    public function handle(CreateStudentDTO $dto): Student
    {
        $student = $dto->toModel(Student::class);
        $student->save();

        return $student;
    }
}
