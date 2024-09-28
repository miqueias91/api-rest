<?php

declare(strict_types=1);

namespace Modules\Auth\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Auth\Filters\UserFilters;
use Modules\Auth\Models\User;
use Modules\Common\Core\DTOs\DatatableDTO;
use Modules\Common\Core\Support\Datatable;

final readonly class FetchUsersList
{
    public function __construct(private UserFilters $filters) {}

    public function handle(DatatableDTO $dto): LengthAwarePaginator|Collection
    {
        $query = User::query()->filtered($this->filters)->all();
        $query = Datatable::applyFilter($query, $dto, ['email', 'name']);
        $query = Datatable::applySort($query, $dto);

        return Datatable::applyPagination($query, $dto);
    }
}
