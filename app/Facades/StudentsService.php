<?php

declare(strict_types=1);

namespace App\Facades;

use App\Services\StudentsService as Service;
use Illuminate\Support\Facades\Facade;

class StudentsService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Service::class;
    }
}
