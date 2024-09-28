<?php

declare(strict_types=1);

namespace Modules\Common\Core\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Common\Core\Models\Concerns\CommonQueries;
use Modules\Common\Core\Models\Concerns\Filterable;
use Modules\Common\Core\Models\Concerns\HasUuids;
use Modules\Common\Core\Models\Concerns\UserActions;

abstract class Model extends BaseModel
{
    use CommonQueries,
        Filterable,
        HasUuids,
        SoftDeletes,
        UserActions;

    protected $nullable = [];

    public static function nullable(): array
    {
        return (new static)->nullable;
    }
}
