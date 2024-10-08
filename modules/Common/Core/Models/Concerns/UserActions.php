<?php

declare(strict_types=1);

namespace Modules\Common\Core\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait UserActions
{
    public bool $disableUserActions = false;

    public static function bootUserActions()
    {
        static::creating(function (Model $model) {
            if ($model->disableUserActions) {
                return;
            }

            $model->created_by = Auth::id();
        });

        static::updating(function (Model $model) {
            if ($model->disableUserActions) {
                return;
            }

            $model->updated_by = Auth::id();
        });

        static::softDeleted(function (Model $model) {
            if ($model->disableUserActions) {
                return;
            }

            $model->deleted_by = Auth::id();
            $model->save();
        });
    }
}
