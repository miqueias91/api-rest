<?php

declare(strict_types=1);

namespace Modules\Student\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Common\Core\DTOs\DatatableDTO;
use Modules\Common\Core\Support\Datatable;
use Modules\Student\Filters\StudentFilters;
use Modules\Student\Models\Student;

final readonly class FetchStudentsList
{
    public function __construct(private StudentFilters $filters) {}

    public function handle(DatatableDTO $dto): LengthAwarePaginator|Collection
    {
        $query = Student::query()->filtered($this->filters)->all();
        $query = Datatable::applyFilter($query, $dto, ['email', 'name']);
        $query = Datatable::applySort($query, $dto);

        return Datatable::applyPagination($query, $dto);
    }
}
