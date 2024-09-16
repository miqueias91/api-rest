<?php

declare(strict_types=1);

namespace App\Common\Support;

enum SortOption: string
{
    case ASC = 'asc';
    case DESC = 'desc';
}
