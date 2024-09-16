<?php

declare(strict_types=1);

namespace App\Services;

use App\Common\DTOs\DatatableDTO;
use App\Common\Support\Datatable;
use App\DTOs\StudentsDTO;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentsService
{
    public function __construct() {}

    public function index(DatatableDTO $dto): LengthAwarePaginator|Collection
    {
        $query = Student::query();
        $query = Datatable::applyFilter($query, $dto, ['name', 'email']);
        $query = Datatable::applySort($query, $dto);

        return Datatable::applyPagination($query, $dto);
    }

    public function show(string $id): Student
    {
        return Student::getByOrFail('id', $id);
    }

    public function store(StudentsDTO $dto): Student
    {
        $student = $dto->toModel(Student::class);
        $student->save();

        return $student;
    }
}
