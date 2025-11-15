<?php

namespace App\Logging;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityLogger
{
    public function log(
        string $action,
        string $entityType,
        int $entityId,
        array $payload = []
    ): ActivityLog {
        return ActivityLog::create([
            'action' => $action,
            'entity_type' => $entityType,
            'entity_id' => $entityId,
            'payload' => $payload,
        ]);
    }

    public function getAllLogs(): Collection
    {
        return ActivityLog::all()->sortByDesc('created_at');
    }
}
