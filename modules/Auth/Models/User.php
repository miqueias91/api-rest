<?php

declare(strict_types=1);

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Common\Core\Models\Concerns\CommonQueries;
use Modules\Common\Core\Models\Concerns\Filterable;
use Modules\Common\Core\Models\Concerns\HasUuids;
use Modules\Common\Core\Models\Concerns\UserActions;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

final class User extends Authenticatable implements JWTSubject
{
    use CommonQueries,
        Filterable,
        HasFactory,
        HasRoles,
        HasUuids,
        InteractsWithMedia,
        LogsActivity,
        Notifiable,
        SoftDeletes,
        UserActions;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'email_verified_at',
        'password',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
    ];

    protected $attributes = [
        'active' => true,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'uuid',
                'name',
                'email',
                'active',
            ]);
    }

    public function scopeAll(Builder $query): Builder
    {
        return $query->withoutGlobalScope('active-users');
    }

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    protected static function booted(): void
    {
        self::addGlobalScope(
            'active-users',
            fn (Builder $builder) => $builder->where('active', true)
        );
    }
}
