<?php

declare(strict_types=1);

namespace Modules\Student\Actions;

use Modules\Student\DTOs\UpdateStudentDTO;
use Modules\Student\Models\Student;

final readonly class UpdateStudent
{
    public function __construct(private FetchStudent $fetchStudent) {}

    public function handle(string $uuid, UpdateStudentDTO $dto): Student
    {
        $student = $this->fetchStudent->handle($uuid);

        $updateData = collect($dto->toArray())->filter(fn (string|bool|null|array $item) => ! is_null($item))->toArray();

        $student->fill($updateData);
        $student->save();

        return $student;
    }
}
