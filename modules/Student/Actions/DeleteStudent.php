<?php

declare(strict_types=1);

namespace Modules\Student\Actions;

final readonly class DeleteStudent
{
    public function __construct(private FetchStudent $fetchStudent) {}

    public function handle(string $uuid): void
    {
        $student = $this->fetchStudent->handle($uuid);
        $student->delete();
    }
}
