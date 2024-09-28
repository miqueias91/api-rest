<?php

declare(strict_types=1);

namespace Modules\Student\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Modules\Common\Core\Models\Concerns\HasUuids;
use Modules\Common\Core\Models\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use HasUuids,
        LogsActivity,
        Notifiable;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'active' => 'boolean',
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
        return $query->withoutGlobalScope('active-students');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(
            'active-students',
            fn (Builder $builder) => $builder->where('active', true)
        );
    }
}
