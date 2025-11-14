<?php

namespace App\Traits;

use App\Logging\ActivityLogger;

trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        static::created(function ($model) {
            app(ActivityLogger::class)->log('created', $model->getTable(), $model->id, $model->attributesToArray());
        });

        static::updated(function ($model) {
            app(ActivityLogger::class)->log('updated', $model->getTable(), $model->id, $model->getChanges());
        });

        static::deleted(function ($model) {
            app(ActivityLogger::class)->log('deleted', $model->getTable(), $model->id);
        });
    }
}
