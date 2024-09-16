<?php

declare(strict_types=1);

namespace App\Facades;

use App\Services\LoginService as Service;
use Illuminate\Support\Facades\Facade;

class LoginService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Service::class;
    }
}
